<?php
namespace norm\realms\;

use norm\core\NormBaseObject;

class CompanyPersonBase extends NormBaseObject {

    /** @var  string */
    protected static $primaryDatastoreName = '';

    /** @var  string */
    protected static $cacheDatastoreName = '';

    /** @var  string */
    protected static $realm = '';

    /** @var  string */
    protected static $tableName = 'company_person';

    /** @var string[] */
    protected static $fieldNames = array('company_id', 'person_id', 'relationship');

    /** @var string[] */
    protected static $fieldTypes = array('int', 'int', 'tinyint');

    /** @var  string[] */
    protected static $propertyNames = array('companyId', 'personId', 'relationship');

    /** @var  string[] */
    protected static $primaryKeyFieldNames = array('company_id', 'person_id', 'company_id', 'person_id');

    /** @var  string[] */
    protected static $primaryKeyPropertyNames = array('companyId', 'personId', 'companyId', 'personId');

    /** @var  string[] */
    protected static $autoIncrementFieldName = '';

    /** @var  string[] */
    protected static $autoIncrementPropertyName = '';

    /** @var bool */
    protected static $hasPrimaryKey = true;

    /** @var bool */
    protected static $hasAutoIncrement = true;

    /** @var int */
    public $companyId;

    /** @var int */
    public $personId;

    /** @var tinyint */
    public $relationship;


    /** @returns \norm\realms\\Company */
    public function getCompany() {
        if($this->Company === null) {
            $this->loadCompany();
        }
        return $this->Company;
    }

    /** @returns \norm\realms\\Person */
    public function getPerson() {
        if($this->Person === null) {
            $this->loadPerson();
        }
        return $this->Person;
    }


    protected function LoadCompany() {
        parent::loadProperty('Company', 'company', 'companyId');
    }

    protected function LoadPerson() {
        parent::loadProperty('Person', 'person', 'personId');
    }

}