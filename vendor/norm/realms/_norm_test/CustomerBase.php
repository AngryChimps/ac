<?php
namespace norm\realms\_norm_test;

use norm\core\NormBaseObject;

class CustomerBase extends NormBaseObject {

    /** @var  string */
    protected static $primaryDatastoreName = '_norm_test_mt';

    /** @var  string */
    protected static $cacheDatastoreName = '';

    /** @var  string */
    protected static $realm = '_norm_test';

    /** @var  string */
    protected static $tableName = 'customer';

    /** @var string[] */
    protected static $fieldNames = array('person_id', 'birthdate');

    /** @var string[] */
    protected static $fieldTypes = array('int', 'DateTime');

    /** @var  string[] */
    protected static $propertyNames = array('personId', 'birthdate');

    /** @var  string[] */
    protected static $primaryKeyFieldNames = array('person_id', 'person_id');

    /** @var  string[] */
    protected static $primaryKeyPropertyNames = array('personId', 'personId');

    /** @var  string[] */
    protected static $autoIncrementFieldName = '';

    /** @var  string[] */
    protected static $autoIncrementPropertyName = '';

    /** @var bool */
    protected static $hasPrimaryKey = true;

    /** @var bool */
    protected static $hasAutoIncrement = true;

    /** @var int */
    public $personId;

    /** @var DateTime */
    public $birthdate;


    /** @returns \norm\realms\_norm_test\Person */
    public function getPerson() {
        if($this->Person === null) {
            $this->loadPerson();
        }
        return $this->Person;
    }


    protected function loadPerson() {
        parent::loadProperty('Person', 'person', 'personId');
    }



}