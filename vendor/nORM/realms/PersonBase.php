<?php
namespace norm\realms\;

use norm\core\NormBaseObject;

class PersonBase extends NormBaseObject {

    /** @var  string */
    protected static $primaryDatastoreName = '';

    /** @var  string */
    protected static $cacheDatastoreName = '';

    /** @var  string */
    protected static $realm = '';

    /** @var  string */
    protected static $tableName = 'person';

    /** @var string[] */
    protected static $fieldNames = array('id', 'name', 'ssn', 'father_id', 'mother_id', 'address_id');

    /** @var string[] */
    protected static $fieldTypes = array('int', 'varchar', 'varchar', 'int', 'int', 'int');

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

    /** @var varchar */
    public $name;

    /** @var varchar */
    public $ssn;

    /** @var int */
    public $fatherId;

    /** @var int */
    public $motherId;

    /** @var int */
    public $addressId;


    /** @returns \norm\realms\\Address */
    public function getAddress() {
        if($this->Address === null) {
            $this->loadAddress();
        }
        return $this->Address;
    }

    /** @returns \norm\realms\\Person */
    public function getFather() {
        if($this->Father === null) {
            $this->loadFather();
        }
        return $this->Father;
    }

    /** @returns \norm\realms\\Person */
    public function getMother() {
        if($this->Mother === null) {
            $this->loadMother();
        }
        return $this->Mother;
    }


    protected function LoadAddress() {
        parent::loadProperty('Address', 'address', 'addressId');
    }

    protected function LoadFather() {
        parent::loadProperty('Father', 'person', 'fatherId');
    }

    protected function LoadMother() {
        parent::loadProperty('Mother', 'person', 'motherId');
    }

}