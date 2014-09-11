<?php
namespace norm\realms\_norm_test;

use norm\core\NormBaseObject;

class CompanyBase extends NormBaseObject {

    /** @var  string */
    protected static $primaryDatastoreName = '_norm_test_mt';

    /** @var  string */
    protected static $cacheDatastoreName = '';

    /** @var  string */
    protected static $realm = '_norm_test';

    /** @var  string */
    protected static $tableName = 'company';

    /** @var string[] */
    protected static $fieldNames = array('id', 'address_id', 'name');

    /** @var string[] */
    protected static $fieldTypes = array('int', 'int', 'string');

    /** @var  string[] */
    protected static $propertyNames = array('id', 'addressId', 'name');

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

    /** @var int */
    public $addressId;

    /** @var string */
    public $name;


    /** @returns \norm\realms\_norm_test\Address */
    public function getAddress() {
        if($this->Address === null) {
            $this->loadAddress();
        }
        return $this->Address;
    }


    protected function loadAddress() {
        parent::loadProperty('Address', 'address', 'addressId');
    }


    /** @returns \norm\realms\_norm_test\Company */
    public function getCompanyCollection() {
        if($this->Company === null) {
            $this->loadCompany();
        }
        return $this->Company;
    }


    protected function loadCompanyCollection() {
        parent::loadPropertyCollection('Company', 'company', '', 'companyId');
    }

}