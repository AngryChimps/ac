<?php
/**
 * Created by PhpStorm.
 * User: sean
 * Date: 6/25/14
 * Time: 3:58 PM
 */

namespace norm\core\generator;


use norm\config\Config;
use norm\core\datastore\DatastoreManager;
use \norm\core\exceptions\InvalidForeignKeyMultipleColumnsException;
use norm\core\generator\generators\MysqlGenerator;
use norm\core\generator\generators\YamlGenerator;
use norm\core\Utils;
use norm\core\generator\types\Schema;
use norm\core\generator\types\Table;
use norm\core\generator\types\Column;
use norm\core\generator\types\ForeignKey;
use Handlebars\Handlebars;

class Generator {
    protected $_realm;
    protected $_schemaManager;

    /**
     * @var ForeignKeyConstraint[]
     */
    protected $_fks = array();

    /**
     * @var Table[]
     */
    protected $_tables = array();

    protected $_reverseForeignKeysByTable = array();

    protected $_classConfigs;

    public function generate($realm) {
        $this->_realm = $realm;
        $ds = DatastoreManager::getReferenceDatastore($realm);
        $gen = new YamlGenerator($ds);
        $schema = $gen->getSchema();

        $this->createRealmFolder();

        foreach($schema->tables as $table) {
            $this->processTable($table);
        }
    }

    protected function createRealmFolder() {
        if(!file_exists(__DIR__ . '/../../realms/' . $this->_realm)) {
            mkdir(__DIR__ . '/../../realms/' . $this->_realm);
        }
    }

    protected function populateClassConfigs() {
        if($this->_classConfigs === null) {
            $ds = DatastoreManager::getReferenceDb($this->_realm);
            $this->_classConfigs = $this->getClassConfigs($this->_realm);
        }
    }

    protected function getClassConfigs() {
        $configs = array();

        $driver = DatastoreManager::getReferenceDbType($this->_realm);
        switch($driver) {
            case 'pdo_mysql':
                $referenceDatastore = Config::$realms[$this->_realm]['referenceDatastore'];
                $schemaName = $referenceDatastore['dbname'];

                $ds = DatastoreManager::getReferenceDb($this->_realm);
                $sql = 'SELECT TABLE_NAME, TABLE_COMMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = ?';
                $params = array($schemaName);

                $stmt = $ds->executeQuery($sql, $params);

                while($row = $stmt->fetch()) {
                    $commentArray = array();
                    $tableName = $row['TABLE_NAME'];
                    $comments = isset($$row['TABLE_COMMENT']) ? $row['TABLE_COMMENT'] : null;

                    if($comments !== null) {
                        $lines = explode("\n", $comments);
                        foreach($lines as $line) {
                            $parts = explode('=', $line, 1);
                            $lpart = trim($parts[0]);
                            $rpart = trim($parts[1]);
                            $commentArray[] = array($lpart => $rpart);
                        }
                        $configs[$tableName] = $commentArray;
                    }
                }
                break;
        }

        return $configs;
    }

    protected function processTable(Table $table) {
        $data = $this->getHandlebarsData($table);
        $this->renderTemplate('NormObject', $data['className'], $data);
        $this->renderTemplate('NormBaseObject', $data['className'] . 'Base', $data);
        $this->renderTemplate('NormCollection', $data['className'] . 'Collection', $data);
        $this->renderTemplate('NormBaseCollection', $data['className'] . 'CollectionBase', $data);
    }

    protected function renderTemplate($templateName, $className, $data) {

        $engine = new Handlebars(array(
            'loader' => new \Handlebars\Loader\FilesystemLoader(__DIR__.'/templates/', array('extension' => 'txt')),
        ));
        $rendered = $engine->render($templateName, $data);

        $filename = __DIR__ . '/../../realms/' . $this->_realm . '/' . $className . '.php';
        if(!file_exists($filename)) {
            touch($filename);
        }
        file_put_contents($filename, $rendered);
    }

    protected function getHandlebarsData(Table $table) {
        $data = array();

        $data['tableName'] = $table->name;
        $data['className'] = Utils::table2class($table->name);
        $data['realm'] = $this->_realm;
        $data['namespace'] = "norm\\realms\\" . $this->_realm;
        $data['primaryDatastoreName'] = !empty($this->_classConfigs[$table->name]['primaryDatastoreName'])
            ? $this->_classConfigs[$table->name]['primaryDatastoreName']
            : Config::$realms[$this->_realm]['defaultPrimaryDatastore'];
        $data['cacheDatastoreName'] = !empty($this->_classConfigs[$table->name]['cacheDatastoreName'])
            ? $this->_classConfigs[$table->name]['cacheDatastoreName']
            : Config::$realms[$this->_realm]['defaultCacheDatastore'];

        $data['fieldNames'] = array();
        $data['propertyNames'] = array();
        $data['propertyTypes'] = array();
        $data['properties'] = array();
        $data['autoIncrementFieldName'] = $table->autoIncrementName;
        $data['autoIncrementPropertyName'] = Utils::field2property($table->autoIncrementName);
        foreach($table->columns as $column) {
            /** @var $column Column */

            $data['fieldNames'][] = $column->name;
            $data['fieldTypes'][] = (string) $column->type;
            $data['propertyNames'][] = Utils::field2property($column->name);
            $data['properties'][] = array(
                'name' => Utils::field2property($column->name),
                'type' => $column->type,
            );
        }

        $data['fieldNamesQuotedString'] = Utils::array2quotedString($data['fieldNames']);
        $data['fieldTypesQuotedString'] = Utils::array2quotedString($data['fieldTypes']);
        $data['propertyNamesQuotedString'] = Utils::array2quotedString($data['propertyNames']);
        $data['hasAutoIncrement'] = ($data['autoIncrementFieldName'] === null) ? 'true' : 'false';

        $data['primaryKeyFieldNames'] = array();
        $data['primaryKeyPropertyNames'] = array();
        if($table->primaryKeyNames !== null) {
            $data['hasPrimaryKey'] = 'true';

            foreach($table->primaryKeyNames as $pk) {
                $data['primaryKeyFieldNames'][] = $pk;
                $data['primaryKeyPropertyNames'][] = Utils::field2property($pk);
            }
        }
        else {
            $data['hasPrimaryKey'] = 'false';
        }

        $data['primaryKeyFieldNamesQuotedString'] = Utils::array2quotedString($data['primaryKeyFieldNames']);
        $data['primaryKeyPropertyNamesQuotedString'] = Utils::array2quotedString($data['primaryKeyPropertyNames']);

        $data['foreignKeys'] = array();

        foreach($table->foreignKeys as $fk) {
            /** @var $fk ForeignKey */
            $newFk = array();
            $newFk['localColumnName'] = $fk->columnName;
            $newFk['remoteTableName'] = $fk->referencedTableName;
            $newFk['remoteColumn'] = $fk->referencedColumnName;
            $newFk['propertyName'] = self::getPropertyFromFkFieldName($fk->columnName);
            $newFk['propertyClass'] = Utils::table2class($fk->referencedTableName);
            $newFk['propertyClassWithNamespace'] = "\\norm\\realms\\" . $this->_realm . "\\"
                . Utils::table2class($fk->referencedTableName);
            $newFk['localPropertyIdFieldName'] = Utils::field2property($fk->referencedColumnName);
            $newFk['remotePropertyClass'] = Utils::table2class($fk->tableName);
            $newFk['remotePropertyClassWithNamespace'] = "\\norm\\realms\\" . $this->_realm . "\\"
                . Utils::table2class($fk->tableName);
            $newFk['remotePropertyIdFieldName'] = Utils::field2property($fk->referencedColumnName);

            $data['foreignKeys'][] = $newFk;
        }

        foreach($table->reverseForeignKeys as $fk) {
            //Don't allow reverse foreign keys into the same table
            if($fk->tableName !== $fk->referencedTableName) {
                /** @var $fk ForeignKey */
                $newFk = array();
                $newFk['localColumnName'] = $fk->columnName;
                $newFk['localTableName'] = $fk->tableName;
                $newFk['remoteTableName'] = $fk->referencedTableName;
                $newFk['remoteColumn'] = $fk->referencedColumnName;
                $newFk['propertyName'] = self::getPropertyFromFkFieldName($fk->columnName);
                $newFk['propertyClass'] = Utils::table2class($fk->referencedTableName);
                $newFk['propertyClassWithNamespace'] = "\\norm\\realms\\" . $this->_realm . "\\"
                    . Utils::table2class($fk->referencedTableName);
                $newFk['localPropertyIdFieldName'] = Utils::field2property($fk->columnName);

                $newFk['remotePropertyClass'] = Utils::table2class($fk->tableName);
                $newFk['remotePropertyClassWithNamespace'] = "\\norm\\realms\\" . $this->_realm . "\\"
                    . Utils::table2class($fk->tableName);
                $newFk['remotePropertyIdFieldName'] = Utils::field2property($fk->referencedColumnName);

                $data['reverseForeignKeys'][] = $newFk;
            }
        }

//        if(isset($this->_reverseForeignKeysByTable[$table->getName()])) {
//            foreach($this->_reverseForeignKeysByTable[$table->getName()] as $fk) {
//                /** @var $fk \Doctrine\DBAL\Schema\ForeignKeyConstraint */
//                $localColumns = $fk->getLocalColumns();
//                $remoteColumns = $fk->getForeignColumns();
//                $localTableName = $fk->getLocalTableName();
//                $remoteTableName = $fk->getForeignTableName();
//
//                if($this->_tables[$remoteTableName])
//
//                if(count($localColumns) != 1 || count($remoteColumns) != 1) {
//                    throw new \norm\core\exceptions\InvalidForeignKeyMultipleColumns($this->_realm, $fk->getName());
//                }
//                $newFk = array();
//                $newFk['localColumnName'] = $localColumns[0];
//                $newFk['localTableName'] = localTableName;
//                $newFk['remoteTableName'] = $remoteTableName;
//                $newFk['remoteColumn'] = $remoteColumns[0];
//                $newFk['propertyName'] = self::getPropertyFromFkFieldName($localColumns[0]);
//                $newFk['propertyClass'] = Utils::table2class($fk->getForeignTableName());
//                $newFk['propertyClassWithNamespace'] = "\\norm\\realms\\" . $this->_realm . "\\"
//                    . Utils::table2class($fk->getForeignTableName());
//                $newFk['localPropertyIdFieldName'] = Utils::field2property($localColumns[0]);
//
//                $data['reverseForeignKeys'][] = $newFk;
//            }
//        }

        return $data;
    }

    public function dump_schema($realm) {
        $ds = DatastoreManager::getReferenceDatastore($realm);
        $gen = new MysqlGenerator($ds);
        $schema = $gen->getSchema();
        print_r($schema);
    }

    protected static function getPropertyFromFkFieldName($fieldName) {
        if(strstr('_id', $fieldName) != strlen($fieldName) - 3) {
            return ucfirst(substr($fieldName, 0, strlen($fieldName) - 3));
        }
        else {
            return ucfirst($fieldName);
        }
    }
}