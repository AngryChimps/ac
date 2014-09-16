<?php


namespace norm\core\generator\generators;


use norm\core\datastore\AbstractDatastore;
use norm\core\exceptions\UnsupportedColumnType;
use norm\core\generator\types\PrimaryKey;
use norm\core\generator\types\Schema;
use norm\core\generator\types\Table;
use norm\core\generator\types\Column;
use norm\core\generator\types\ForeignKey;

class YamlGenerator extends AbstractGenerator {
    /** @var  AbstractDatastore */
    private $datastore;

    public function __construct(AbstractDatastore $datastore) {
        $this->datastore = $datastore;
    }

    /**
     * @returns Schema
     */
    public function getSchema() {
        $schema = new Schema();

        foreach($this->getTableNames() as $tableName) {
            $table = new Table();
            $table->name = $tableName;
//            $table->comment = $row['TABLE_COMMENT'];
//            $table->primaryKeyNames = $this->getPrimaryKeyFieldNames($table->name);
            $tableData = $this->getTableData($table->name);
            $table->data = $tableData;
            if(isset($tableData['primary_keys'])) {
                $table->primaryKeyNames = $tableData['primary_keys'];
            }
            $ordinalPosition = 0;
            foreach($tableData['fields'] as $fieldName => $fieldData) {
                $column = new Column();
                $column->name = $fieldName;
                $column->position = $ordinalPosition;
                $column->default = isset($fieldData['default']) ? $fieldData['default'] : null;
//                $column->typeWithLength = $columnRow['COLUMN_TYPE'];
                $column->type = $fieldData['type'];
//                $column->length = isset($fieldData['length']) ? $fieldData['length'] : null;

//                if($columnRow['EXTRA'] === 'auto_increment') {
//                    $table->autoIncrementName = $column->name;
//                }

                $table->columns[$column->name] = $column;

                $ordinalPosition++;
            }

            $schema->tables[$tableName] = $table;
        }

        //Get foreign key info
        foreach($schema->tables as $table) {
            if(isset($table->data['foreign_keys'])) {
                foreach($table->data['foreign_keys'] as $fkName => $fkData) {
                    $key = new ForeignKey();
                    $key->name = $fkName;
                    $key->tableName = $table->name;
                    $key->columnName = $fkData['column_name'];
                    $key->referencedTableName = $fkData['referenced_table_name'];
                    $key->referencedColumnName = $fkData['referenced_column_name'];

                    $schema->foreignKeys[] = $key;
                    $schema->tables[$key->tableName]->foreignKeys[] = $key;
                    $schema->tables[$key->referencedTableName]->reverseForeignKeys[] = $key;
                }
            }
        }

        return $schema;
    }

    protected function getTableNames() {
        $tables = array();

        $handle = opendir(__DIR__ . "/../../../realms/db/yaml/classes");

        while (false !== ($entry = readdir($handle))) {
            //Ignore . and .. entries
            if($entry == '.' || $entry == '..') {
                continue;
            }

            $parts = explode('.', $entry);
            $tables[] = $parts[0];
        }

        return $tables;
    }

    protected function getTableData($tableName) {
        $contents = file_get_contents(__DIR__ . "/../../../realms/db/yaml/classes/" . $tableName . '.yml');
        return yaml_parse($contents);
    }
}