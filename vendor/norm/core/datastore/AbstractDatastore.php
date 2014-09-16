<?php
/**
 * Created by PhpStorm.
 * User: sean
 * Date: 6/19/14
 * Time: 10:06 AM
 */

namespace norm\core\datastore;


use norm\core\NormBaseObject;
use norm\core\NormBaseCollection;

abstract class AbstractDatastore {
    protected $connection;

    public abstract function create($tableName, $fieldData, $primaryKeys, $autoIncrementFieldName);
    public abstract function read($tableName, $primaryKeys);
    public abstract function update($tableName, $primaryKeys, $fieldDataWithoutPrimaryKeys);
    public abstract function delete ($tableName, $primaryKeys);
    public abstract function createCollection($tableName, $fieldData, $primaryKeys, $autoIncrementFieldName);
    public abstract function readCollection($tableName, $primaryKeys);
    public abstract function updateCollection($tableName, $primaryKeys, $fieldDataWithoutPrimaryKeys);
    public abstract function deleteCollection ($tableName, $primaryKeys);

    public abstract function readBySql($sql, $params);
    public abstract function readByWhere($tableName, $where, $params);
    public abstract function readCollectionBySql($sql, $params);
    public abstract function readCollectionByWhere($tableName, $where, $params);

    public abstract function query($sql, $params = array());
    public abstract function queryOneValue($sql, $params = array());
    public abstract function queryOneColumn($sql, $params = array());

    public abstract function getDbName();
}