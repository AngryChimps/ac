<?php
namespace norm\test\realms\_mysql\base;

use norm\core\NormBaseObject;

class CustomerBase extends NormBaseObject {

    /** @var  string */
    protected static $primaryDatastoreName = '__norm_test_mysql';

    /** @var  string */
    protected static $cacheDatastoreName = '';

    /** @var  string */
    protected static $realm = '_mysql';

    /** @var  string */
    protected static $tableName = 'customer';

    /** @var string[] */
    protected static $fieldNames = array('person_id', 'dob');

    /** @var string[] */
    protected static $fieldTypes = array('int', 'Date');

    /** @var  string[] */
    protected static $propertyNames = array('personId', 'dob');

    /** @var  string[] */
    protected static $primaryKeyFieldNames = array('person_id');

    /** @var  string[] */
    protected static $primaryKeyPropertyNames = array('personId');

    /** @var  string[] */
    protected static $autoIncrementFieldName = '';

    /** @var  string[] */
    protected static $autoIncrementPropertyName = '';

    /** @var bool */
    protected static $hasPrimaryKey = true;

    /** @var bool */
    protected static $hasAutoIncrement = false;


    /** @var int */
    public $personId;

    /** @var Date */
    public $dob;






    /**
     * @param $pk
     * @return Customer
     */
    public static function getByPk($pk) {
        return parent::getByPk($pk);
    }

    /**
     * @param $where string The WHERE clause (excluding the word WHERE)
     * @param array $params The parameter count
     * @return Customer
     */
    public static function getByWhere($where, $params = array()) {
        return parent::getByWhere($where, $params);
    }

    /**
     * @param $sql The complete sql statement with placeholders
     * @param array $params The parameter array to replace placeholders in the sql
     * @return Customer
     */
    public static function getBySql($sql, $params = array()) {
        return parent::getBySql($sql, $params);
    }

}