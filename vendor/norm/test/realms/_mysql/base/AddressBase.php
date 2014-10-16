<?php
namespace norm\test\realms\_mysql\base;

use norm\core\NormBaseObject;

class AddressBase extends NormBaseObject {

    /** @var  string */
    protected static $primaryDatastoreName = '__norm_test_mysql';

    /** @var  string */
    protected static $cacheDatastoreName = '';

    /** @var  string */
    protected static $realm = '_mysql';

    /** @var  string */
    protected static $tableName = 'address';

    /** @var string[] */
    protected static $fieldNames = array('id', 'street', 'city', 'state', 'zip', 'zip4');

    /** @var string[] */
    protected static $fieldTypes = array('int', 'string', 'string', 'string', 'int', 'int');

    /** @var  string[] */
    protected static $propertyNames = array('id', 'street', 'city', 'state', 'zip', 'zip4');

    /** @var  string[] */
    protected static $primaryKeyFieldNames = array('id');

    /** @var  string[] */
    protected static $primaryKeyPropertyNames = array('id');

    /** @var  string[] */
    protected static $autoIncrementFieldName = 'id';

    /** @var  string[] */
    protected static $autoIncrementPropertyName = 'id';

    /** @var bool */
    protected static $hasPrimaryKey = true;

    /** @var bool */
    protected static $hasAutoIncrement = true;


    /** @var int */
    public $id;

    /** @var string */
    public $street;

    /** @var string */
    public $city;

    /** @var string */
    public $state;

    /** @var int */
    public $zip;

    /** @var int */
    public $zip4;




    /** @returns \norm\test\realms\_mysql\Company */
    public function getCompanyCollection() {
        if($this->Company === null) {
            $this->loadCompany();
        }
        return $this->Company;
    }

    /** @returns \norm\test\realms\_mysql\Person */
    public function getPersonCollection() {
        if($this->Person === null) {
            $this->loadPerson();
        }
        return $this->Person;
    }


    protected function loadCompanyCollection() {
        parent::loadPropertyCollection('Company', 'company', 'address_id', 'addressId');
    }

    protected function loadPersonCollection() {
        parent::loadPropertyCollection('Person', 'person', 'address_id', 'addressId');
    }


    /**
     * @param $pk
     * @return Address
     */
    public static function getByPk($pk) {
        return parent::getByPk($pk);
    }

    /**
     * @param $where string The WHERE clause (excluding the word WHERE)
     * @param array $params The parameter count
     * @return Address
     */
    public static function getByWhere($where, $params = array()) {
        return parent::getByWhere($where, $params);
    }

    /**
     * @param $sql The complete sql statement with placeholders
     * @param array $params The parameter array to replace placeholders in the sql
     * @return Address
     */
    public static function getBySql($sql, $params = array()) {
        return parent::getBySql($sql, $params);
    }

}