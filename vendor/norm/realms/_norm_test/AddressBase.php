<?php
namespace norm\realms\_norm_test;

use norm\core\NormBaseObject;

class AddressBase extends NormBaseObject {

    /** @var  string */
    protected static $primaryDatastoreName = '_norm_test_mt';

    /** @var  string */
    protected static $cacheDatastoreName = '';

    /** @var  string */
    protected static $realm = '_norm_test';

    /** @var  string */
    protected static $tableName = 'address';

    /** @var string[] */
    protected static $fieldNames = array('id', 'street', 'city', 'state', 'zip', 'zip4');

    /** @var string[] */
    protected static $fieldTypes = array('int', 'string', 'string', 'string', 'int', 'int');

    /** @var  string[] */
    protected static $propertyNames = array('id', 'street', 'city', 'state', 'zip', 'zip4');

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
    public $street;

    /** @var string */
    public $city;

    /** @var string */
    public $state;

    /** @var int */
    public $zip;

    /** @var int */
    public $zip4;




    /** @returns \norm\realms\_norm_test\Address */
    public function getAddressCollection() {
        if($this->Address === null) {
            $this->loadAddress();
        }
        return $this->Address;
    }

    /** @returns \norm\realms\_norm_test\Address */
    public function getAddressCollection() {
        if($this->Address === null) {
            $this->loadAddress();
        }
        return $this->Address;
    }


    protected function loadAddressCollection() {
        parent::loadPropertyCollection('Address', 'address', '', 'addressId');
    }

    protected function loadAddressCollection() {
        parent::loadPropertyCollection('Address', 'address', '', 'addressId');
    }

}