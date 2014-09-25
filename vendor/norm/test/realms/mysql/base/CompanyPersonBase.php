<?php
namespace norm\realms\mysql\base;

use norm\core\NormBaseObject;

class CompanyPersonBase extends NormBaseObject {

    /** @var  string */
    protected static $primaryDatastoreName = 'mysql';

    /** @var  string */
    protected static $cacheDatastoreName = '';

    /** @var  string */
    protected static $realm = 'mysql';

    /** @var  string */
    protected static $tableName = 'company_person';

    /** @var string[] */
    protected static $fieldNames = array('company_id', 'person_id', 'status');

    /** @var string[] */
    protected static $fieldTypes = array('int', 'int', 'int');

    /** @var  string[] */
    protected static $propertyNames = array('companyId', 'personId', 'status');

    /** @var  string[] */
    protected static $primaryKeyFieldNames = array('company', 'person');

    /** @var  string[] */
    protected static $primaryKeyPropertyNames = array('company', 'person');

    /** @var  string[] */
    protected static $autoIncrementFieldName = '';

    /** @var  string[] */
    protected static $autoIncrementPropertyName = '';

    /** @var bool */
    protected static $hasPrimaryKey = true;

    /** @var bool */
    protected static $hasAutoIncrement = false;

    const EmployedStatus = 1;
    const TerminatedStatus = 2;
    const QuitStatus = 3;

    /** @var int */
    public $companyId;

    /** @var int */
    public $personId;

    /** @var int */
    public $status;


    /** @returns \norm\realms\mysql\Company */
    public function getCompany() {
        if($this->Company === null) {
            $this->loadCompany();
        }
        return $this->Company;
    }

    /** @returns \norm\realms\mysql\Person */
    public function getPerson() {
        if($this->Person === null) {
            $this->loadPerson();
        }
        return $this->Person;
    }


    protected function loadCompany() {
        parent::loadProperty('Company', 'company', 'id');
    }

    protected function loadPerson() {
        parent::loadProperty('Person', 'person', 'id');
    }




    /**
     * @param $pk
     * @return CompanyPerson
     */
    public static function getByPk($pk) {
        return parent::getByPk($pk);
    }

    /**
     * @param $where string The WHERE clause (excluding the word WHERE)
     * @param array $params The parameter count
     * @return CompanyPerson
     */
    public static function getByWhere($where, $params = array()) {
        return parent::getByWhere($where, $params);
    }

    /**
     * @param $sql The complete sql statement with placeholders
     * @param array $params The parameter array to replace placeholders in the sql
     * @return CompanyPerson
     */
    public static function getBySql($sql, $params = array()) {
        return parent::getBySql($sql, $params);
    }

}