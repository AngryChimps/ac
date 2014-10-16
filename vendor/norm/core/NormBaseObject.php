<?php
/**
 * Created by PhpStorm.
 * User: sean
 * Date: 4/24/14
 * Time: 12:32 PM
 */

namespace norm\core;

use \norm\core\datastore\AbstractDatastore;
use norm\core\datastore\DatastoreManager;
use \norm\config\Config;
use \norm\core\exceptions\CannotChangePrimaryKeyException;
use Symfony\Component\Validator\Constraints\DateTime;


abstract class NormBaseObject {
    protected $_originalPropertyData = array();

    /**
     * @var AbstractDatastore
     */
    private $_db;

    /**
     * @var AbstractDatastore
     */
    private $_cache;

    private $_hasBeenPersisted = false;

    protected static $realm;
    protected static $primaryDatastoreName;
    protected static $cacheDatastoreName;
    protected static $tableName;
    protected static $fieldNames;
    protected static $fieldTypes;
    protected static $propertyNames;
    protected static $primaryKeyPropertyNames;
    protected static $primaryKeyFieldNames;
    protected static $autoIncrementFieldName;
    protected static $autoIncrementPropertyName;

    public function __construct() {
        $this->_db = DatastoreManager::getDatastore(static::$primaryDatastoreName);
    }

    public function save() {
        //Set created_at updated_at datetimes
        $this->updateDateTimes();

        if($this->_hasBeenPersisted) {
            $this->checkPrimaryKeyValuesHaveNotChanged();
            $this->_db->update(static::$realm, static::$tableName, $this->getPrimaryKeyData(), $this->getFieldDataWithoutPrimaryKeys());
        }
        else {
            if(empty(static::$autoIncrementPropertyName)) {
                $this->_db->create(static::$realm, static::$tableName, $this->getFieldData(), $this->getPrimaryKeyData(),
                    static::$autoIncrementPropertyName);
            }
            else {
                $id = $this->_db->create(static::$realm, static::$tableName, $this->getFieldData(),
                    $this->getPrimaryKeyData(), static::$autoIncrementPropertyName);
                $this->{static::$autoIncrementPropertyName} = (int) $id;
            }
            $this->_hasBeenPersisted = true;
        }

        $this->updateOriginalValues();
    }

    protected function updateDateTimes() {
        if(in_array('created_at', static::$fieldNames) && $this->createdAt !== null) {
            $this->createdAt = new \DateTime();
        }
        if(in_array('updated_at', static::$fieldNames)) {
            $this->updatedAt = new \DateTime();
        }
    }

    protected function updateOriginalValues() {
        foreach(static::$propertyNames as $name) {
            $this->_originalPropertyData[$name] = $this->$name;
        }
    }

    protected function checkPrimaryKeyValuesHaveNotChanged() {
        foreach(static::$primaryKeyPropertyNames as $pkName) {
            if($this->$pkName !== $this->_originalPropertyData[$pkName]) {
                throw new CannotChangePrimaryKeyException(static::$primaryDatastoreName, static::$tableName);
            }
        }
    }

    public function checkFieldDataTypes() {
        for($i = 0; $i < count(static::$propertyNames); $i++) {

        }
    }

    public function delete() {
        if(!$this->_hasBeenPersisted) {
            return;
        }

        $this->_db->delete(static::$realm, static::$tableName, $this->getPrimaryKeyData());
    }

    public static function getByPk($pk) {
        $pkData = array();
        $className = get_called_class();
        if(!is_array($pk)) {
            $pk = array($pk);
        }

        $obj = NormObjectLocalStore::get(static::$realm, $className, $pk);
        if($obj !== null) {
            return $obj;
        }

        for($i=0; $i<count(static::$primaryKeyFieldNames); $i++) {
            $pkData[static::$primaryKeyFieldNames[$i]] = $pk[$i];
        }

        $ds = DatastoreManager::getDatastore(static::$primaryDatastoreName);
        $data = $ds->read(static::$realm, static::$tableName, $pkData);

        if($data === null) {
            return null;
        }

        $obj = new $className();
        $obj->loadByFieldDataArray($data);

        NormObjectLocalStore::add($obj);

        return $obj;
    }

    public static function getBySql($sql, $params = array()) {
        $className = get_called_class();
        $ds = DatastoreManager::getDatastore(static::$primaryDatastoreName);
        $data = $ds->readBySql($sql, $params);
        $obj = new $className();
        $obj->loadByFieldDataArray($data);

        NormObjectLocalStore::add($obj);

        return $obj;
    }

    public static function getByWhere($where, $params = array()) {
        $className = get_called_class();
        $ds = DatastoreManager::getDatastore(static::$primaryDatastoreName);
        $data = $ds->readByWhere(static::$tableName, $where, $params);
        $obj = new $className();
        $obj->loadByFieldDataArray($data);

        NormObjectLocalStore::add($obj);

        return $obj;
    }

    public function invalidate() {
        NormObjectLocalStore::invalidate(self::$realm, get_called_class(), $this->getPrimaryKeyData());
    }

    public static function invalidateAll() {
        NormObjectLocalStore::invalidateAll();
    }

    public function loadByJson($json) {
        $array = json_decode($json);
        foreach($array as $k => $v) {
            $this->$k = $v;
        }
    }

    public function loadByFieldDataArray($arr)
    {
        if (is_array($arr)) {
            for ($i = 0; $i < count($arr); $i++) {
                switch (static::$fieldTypes[$i]) {
                    case 'int':
                        $this->{static::$propertyNames[$i]} = (int)$arr[$i];
                        break;
                    case 'bool':
                        $this->{static::$propertyNames[$i]} = (bool)$arr[$i];
                        break;
                    case 'float':
                        $this->{static::$propertyNames[$i]} = (float)$arr[$i];
                        break;
                    case 'DateTime':
                        $this->{static::$propertyNames[$i]} = new DateTime($arr[$i]);
                        break;
                    default:
                        $this->{static::$propertyNames[$i]} = $arr[$i];
                }
            }
        }
        else {
            for ($i = 0; $i < count($arr); $i++) {
                switch (static::$fieldTypes[$i]) {
                    case 'int':
                        $this->{static::$propertyNames[$i]} = (int)$arr->{static::$propertyNames[$i]};
                        break;
                    case 'bool':
                        $this->{static::$propertyNames[$i]} = (bool)$arr->{static::$propertyNames[$i]};
                        break;
                    case 'float':
                        $this->{static::$propertyNames[$i]} = (float)$arr->{static::$propertyNames[$i]};
                        break;
                    case 'DateTime':
                        $this->{static::$propertyNames[$i]} = new DateTime($arr->{static::$propertyNames[$i]});
                        break;
                    default:
                        $this->{static::$propertyNames[$i]} = $arr->{static::$propertyNames[$i]};
                }
            }
        }
    }

    public function getPrimaryKeyData() {
        $data = array();

        foreach(static::$primaryKeyPropertyNames as $pkName) {
            $data[$pkName] = $this->$pkName;
        }

        return $data;
    }

    protected function getFieldDataWithoutPrimaryKeys() {
        $data = array();
        $propertyNames = array_diff(static::$propertyNames, static::$primaryKeyPropertyNames);

        foreach($propertyNames as $propertyName) {
            $data[$propertyName] = $this->$propertyName;
        }

        return $data;
    }

    protected function hasCache() {
        return ($this->_cache === NULL);
    }

    public function getRealm() {
        return static::$realm;
    }

    public function getFieldData() {
        $arr = array();
        for($i = 0; $i < count(static::$propertyNames); $i++) {
            $arr[static::$fieldNames[$i]] = $this->{static::$propertyNames[$i]};
        }
        return $arr;
    }

    public function isNewObject() {
        return $this->_hasBeenPersisted;
    }

    public function hasAutoIncrement() {
        return (static::$autoIncrementFieldName !== NULL);
    }

    protected function loadProperty($propertyName, $remoteTableName, $localPropertyIdFieldName) {
        $remoteClassName = Utils::table2class($remoteTableName);
        $remoteObj = new $remoteClassName();
        $remoteObj->loadById($this->$localPropertyIdFieldName);
        $this->{$propertyName} = $remoteObj;
    }

    protected function loadPropertyCollection($propertyName, $remoteTableName, $remoteFieldName,
                                              $localPropertyIdFieldName) {
        $remoteClassName = Utils::table2class($remoteTableName) . 'Collection';
        $remoteObj = new $remoteClassName();
        $remoteObj->loadByWhere($remoteFieldName . ' = :fieldName', array(':fieldName' => $this->$localPropertyIdFieldName));
        $this->{$propertyName} = $remoteObj;
    }
}