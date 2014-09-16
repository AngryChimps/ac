<?php
namespace norm\realms\db;

use norm\core\NormBaseObject;

class CompanyBase extends NormBaseObject {

    /** @var  string */
    protected static $primaryDatastoreName = 'mt';

    /** @var  string */
    protected static $cacheDatastoreName = '';

    /** @var  string */
    protected static $realm = 'db';

    /** @var  string */
    protected static $tableName = 'company';

    /** @var string[] */
    protected static $fieldNames = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11');

    /** @var string[] */
    protected static $fieldTypes = array('string', 'string', 'string', 'string', 'CompanyPlan', 'int', 'int', 'float', 'int', 'string[]', 'DateTime', 'DateTime');

    /** @var  string[] */
    protected static $propertyNames = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11');

    /** @var  string[] */
    protected static $primaryKeyFieldNames = array('company_key');

    /** @var  string[] */
    protected static $primaryKeyPropertyNames = array('companyKey');

    /** @var  string[] */
    protected static $autoIncrementFieldName = '';

    /** @var  string[] */
    protected static $autoIncrementPropertyName = '';

    /** @var bool */
    protected static $hasPrimaryKey = true;

    /** @var bool */
    protected static $hasAutoIncrement = true;

    /** @var string */
    public $0;

    /** @var string */
    public $1;

    /** @var string */
    public $2;

    /** @var string */
    public $3;

    /** @var CompanyPlan */
    public $4;

    /** @var int */
    public $5;

    /** @var int */
    public $6;

    /** @var float */
    public $7;

    /** @var int */
    public $8;

    /** @var string[] */
    public $9;

    /** @var DateTime */
    public $10;

    /** @var DateTime */
    public $11;




    /** @returns \norm\realms\db\Location */
    public function getLocationCollection() {
        if($this->Location === null) {
            $this->loadLocation();
        }
        return $this->Location;
    }


    protected function loadLocationCollection() {
        parent::loadPropertyCollection('Location', 'location', 'company_key', 'companyKey');
    }


    /**
     * @param $pk
     * @return Company
     */
    public static function getByPk($pk) {
        return parent::getByPk($pk);
    }

    /**
     * @param $where string The WHERE clause (excluding the word WHERE)
     * @param array $params The parameter count
     * @return Company
     */
    public static function getByWhere($where, $params = array()) {
        return parent::getByWhere($where, $params);
    }

    /**
     * @param $sql The complete sql statement with placeholders
     * @param array $params The parameter array to replace placeholders in the sql
     * @return Company
     */
    public static function getBySql($sql, $params = array()) {
        return parent::getBySql($sql, $params);
    }

}