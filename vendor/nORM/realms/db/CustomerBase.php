<?php
namespace norm\realms\db;

use norm\core\NormBaseObject;

class CustomerBase extends NormBaseObject {

    /** @var  string */
    protected static $primaryDatastoreName = 'mt';

    /** @var  string */
    protected static $cacheDatastoreName = '';

    /** @var  string */
    protected static $realm = 'db';

    /** @var  string */
    protected static $tableName = 'customer';

    /** @var string[] */
    protected static $fieldNames = array('person_id', 'birthdate');

    /** @var string[] */
    protected static $fieldTypes = array('int', 'datetime');

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

    /** @var datetime */
    public $birthdate;


    /** @returns \norm\realms\db\Person */
    public function getPerson() {
        if($this->Person === null) {
            $this->loadPerson();
        }
        return $this->Person;
    }


    protected function LoadPerson() {
        parent::loadProperty('Person', 'person', 'personId');
    }

}