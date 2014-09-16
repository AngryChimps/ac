<?php
namespace norm\realms\_norm_test;

use norm\core\NormBaseObject;

class PersonBase extends NormBaseObject {

    /** @var  string */
    protected static $primaryDatastoreName = '_norm_test_mt';

    /** @var  string */
    protected static $cacheDatastoreName = '';

    /** @var  string */
    protected static $realm = '_norm_test';

    /** @var  string */
    protected static $tableName = 'person';

    /** @var string[] */
    protected static $fieldNames = array('id', 'name', 'ssn', 'father_id', 'mother_id', 'address_id');

    /** @var string[] */
    protected static $fieldTypes = array('int', 'string', 'string', 'int', 'int', 'int');

    /** @var  string[] */
    protected static $propertyNames = array('id', 'name', 'ssn', 'fatherId', 'motherId', 'addressId');

    /** @var  string[] */
    protected static $primaryKeyFieldNames = array('id', 'id');

    /** @var  string[] */
    protected static $primaryKeyPropertyNames = array('id', 'id');

    /** @var  string[] */
    protected static $autoIncrementFieldName = 'id';

    /** @var  string[] */
    protected static $autoIncrementPropertyName = 'id';

    /** @var bool */
    protected static $hasPrimaryKey = true;

    /** @var bool */
    protected static $hasAutoIncrement = false;

    /** @var int */
    public $id;

    /** @var string */
    public $name;

    /** @var string */
    public $ssn;

    /** @var int */
    public $fatherId;

    /** @var int */
    public $motherId;

    /** @var int */
    public $addressId;


    /** @returns \norm\realms\_norm_test\Address */
    public function getAddress() {
        if($this->Address === null) {
            $this->loadAddress();
        }
        return $this->Address;
    }

    /** @returns \norm\realms\_norm_test\Person */
    public function getFather() {
        if($this->Father === null) {
            $this->loadFather();
        }
        return $this->Father;
    }

    /** @returns \norm\realms\_norm_test\Person */
    public function getMother() {
        if($this->Mother === null) {
            $this->loadMother();
        }
        return $this->Mother;
    }


    protected function loadAddress() {
        parent::loadProperty('Address', 'address', 'id');
    }

    protected function loadFather() {
        parent::loadProperty('Father', 'person', 'id');
    }

    protected function loadMother() {
        parent::loadProperty('Mother', 'person', 'id');
    }


    /** @returns \norm\realms\_norm_test\CompanyPerson */
    public function getCompanyPersonCollection() {
        if($this->CompanyPerson === null) {
            $this->loadCompanyPerson();
        }
        return $this->CompanyPerson;
    }

    /** @returns \norm\realms\_norm_test\Customer */
    public function getCustomerCollection() {
        if($this->Customer === null) {
            $this->loadCustomer();
        }
        return $this->Customer;
    }


    protected function loadCompanyPersonCollection() {
        parent::loadPropertyCollection('CompanyPerson', 'company_person', 'person_id', 'personId');
    }

    protected function loadCustomerCollection() {
        parent::loadPropertyCollection('Customer', 'customer', 'person_id', 'personId');
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