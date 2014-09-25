<?php
namespace norm\realms\mysql\base;

use norm\core\NormBaseObject;

class PersonBase extends NormBaseObject {

    /** @var  string */
    protected static $primaryDatastoreName = 'mysql';

    /** @var  string */
    protected static $cacheDatastoreName = '';

    /** @var  string */
    protected static $realm = 'mysql';

    /** @var  string */
    protected static $tableName = 'person';

    /** @var string[] */
    protected static $fieldNames = array('id', 'father_id', 'mother_id', 'address_id');

    /** @var string[] */
    protected static $fieldTypes = array('int', 'int', 'int', 'int');

    /** @var  string[] */
    protected static $propertyNames = array('id', 'fatherId', 'motherId', 'addressId');

    /** @var  string[] */
    protected static $primaryKeyFieldNames = array('id');

    /** @var  string[] */
    protected static $primaryKeyPropertyNames = array('id');

    /** @var  string[] */
    protected static $autoIncrementFieldName = '';

    /** @var  string[] */
    protected static $autoIncrementPropertyName = '';

    /** @var bool */
    protected static $hasPrimaryKey = true;

    /** @var bool */
    protected static $hasAutoIncrement = false;


    /** @var int */
    public $id;

    /** @var int */
    public $fatherId;

    /** @var int */
    public $motherId;

    /** @var int */
    public $addressId;


    /** @returns \norm\realms\mysql\Address */
    public function getAddress() {
        if($this->Address === null) {
            $this->loadAddress();
        }
        return $this->Address;
    }


    protected function loadAddress() {
        parent::loadProperty('Address', 'address', 'id');
    }


    /** @returns \norm\realms\mysql\CompanyPerson */
    public function getCompanyPersonCollection() {
        if($this->CompanyPerson === null) {
            $this->loadCompanyPerson();
        }
        return $this->CompanyPerson;
    }


    protected function loadCompanyPersonCollection() {
        parent::loadPropertyCollection('CompanyPerson', 'company_person', 'person_id', 'personId');
    }


    /**
     * @param $pk
     * @return Person
     */
    public static function getByPk($pk) {
        return parent::getByPk($pk);
    }

    /**
     * @param $where string The WHERE clause (excluding the word WHERE)
     * @param array $params The parameter count
     * @return Person
     */
    public static function getByWhere($where, $params = array()) {
        return parent::getByWhere($where, $params);
    }

    /**
     * @param $sql The complete sql statement with placeholders
     * @param array $params The parameter array to replace placeholders in the sql
     * @return Person
     */
    public static function getBySql($sql, $params = array()) {
        return parent::getBySql($sql, $params);
    }

}