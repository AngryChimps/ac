<?php
/**
 * Created by PhpStorm.
 * User: sean
 * Date: 6/18/14
 * Time: 1:13 PM
 */

namespace norm\core\datastore;


use norm\core\NormBaseObject;
use norm\core\Utils;

class RiakBlobDatastore extends AbstractRiakDatastore {

    protected function _getKeyName($primaryKeys) {
        return implode('|', $primaryKeys);
    }

    public function create($tableName, $fieldData, $primaryKeys, $autoIncrementFieldName)
    {
        if(!empty($autoIncrementFieldName)) {
            throw new \Exception('Auto-increment fields are not supported in the RiakBlobDatastore');
        }
        $bucket = $this->getBucket($tableName);
        $key = $this->_getKeyName($primaryKeys);
        $data = json_encode($fieldData);

        $obj = new \Riak\Object($key);
        $obj->setContent($data);
        $bucket->put($obj);
    }

    public function read($tableName, $primaryKeys)
    {
        $bucket = $this->getBucket($tableName);
        $key = $this->_getKeyName($primaryKeys);

        $response = $bucket->get($key);

        return json_decode($response);
    }

    public function update($tableName, $primaryKeys, $fieldDataWithoutPrimaryKeys)
    {
        $bucket = $this->getBucket($tableName);
        $key = $this->_getKeyName($primaryKeys);
        $data = json_encode(array_merge($primaryKeys, $fieldDataWithoutPrimaryKeys));

        // Read back the object from Riak
        $response = $bucket->get($key);

        // Make sure we got an object back
        if ($response->hasObject()) {
            // Get the first returned object
            $readObject = $response->getFirstObject();
        }
        else {
            throw new \Exception('Original object not found; unable to update.');
        }
        $readObject->setContent($data);
        $bucket->put($readObject);
    }

    public function delete($tableName, $primaryKeys)
    {
        $bucket = $this->getBucket($tableName);
        $key = $this->_getKeyName($primaryKeys);

        // Read back the object from Riak
        $response = $bucket->get($key);

        // Make sure we got an object back
        if ($response->hasObject()) {
            // Get the first returned object
            $readObject = $response->getFirstObject();
        }
        else {
            throw new \Exception('Original object not found; unable to update.');
        }

        $bucket->delete($readObject);
    }

    public function createCollection($tableName, $fieldData, $primaryKeys, $autoIncrementFieldName)
    {
        for($i=0; $i<count($primaryKeys); $i++) {
            $this->create($tableName, $fieldData[$i], $primaryKeys[$i], $autoIncrementFieldName);
        }
    }

    public function readCollection($tableName, $primaryKeys)
    {
        $arr = array();
        foreach($primaryKeys as $pk) {
            $arr[] = $this->read($tableName, $pk);
        }
        return $arr;
    }

    public function updateCollection($tableName, $primaryKeys, $fieldDataWithoutPrimaryKeys)
    {
        for($i=0; $i<count($primaryKeys); $i++) {
            $this->update($tableName, $primaryKeys[$i], $fieldDataWithoutPrimaryKeys[$i]);
        }
    }

    public function deleteCollection($tableName, $primaryKeys)
    {
        for($i=0; $i<count($primaryKeys); $i++) {
            $this->delete($tableName, $primaryKeys[$i]);
        }
    }

    public function readBySql($sql, $params, $normObject)
    {
        throw new MethodNotImplemented(__METHOD__, get_called_class());
    }

    public function readByWhere($tableName, $where, $params, $normObject)
    {
        throw new MethodNotImplemented(__METHOD__, get_called_class());
    }

    public function readCollectionBySql($sql, $params, $normCollection)
    {
        throw new MethodNotImplemented(__METHOD__, get_called_class());
    }

    public function readCollectionByWhere($tableName, $where, $params, $normCollection)
    {
        throw new MethodNotImplemented(__METHOD__, get_called_class());
    }

    public function query($sql, $params = array())
    {
        throw new MethodNotImplemented(__METHOD__, get_called_class());
    }

    public function queryOneValue($sql, $params = array())
    {
        throw new MethodNotImplemented(__METHOD__, get_called_class());
    }

    public function queryOneColumn($sql, $params = array())
    {
        throw new MethodNotImplemented(__METHOD__, get_called_class());
    }

    public function getDbName()
    {
        throw new MethodNotImplemented(__METHOD__, get_called_class());
    }
}