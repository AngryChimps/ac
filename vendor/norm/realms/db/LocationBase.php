<?php
namespace norm\realms\db;

use norm\core\NormBaseObject;

class LocationBase extends NormBaseObject {

    /** @var  string */
    protected static $primaryDatastoreName = 'mt';

    /** @var  string */
    protected static $cacheDatastoreName = '';

    /** @var  string */
    protected static $realm = 'db';

    /** @var  string */
    protected static $tableName = 'location';

    /** @var string[] */
    protected static $fieldNames = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11');

    /** @var string[] */
    protected static $fieldTypes = array('string', 'string', 'string', 'string', 'string', 'float', 'float', 'string[]', 'DateTime[]', 'AdFlag[]', 'DateTime', 'DateTime');

    /** @var  string[] */
    protected static $propertyNames = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11');

    /** @var  string[] */
    protected static $primaryKeyFieldNames = array('location_key');

    /** @var  string[] */
    protected static $primaryKeyPropertyNames = array('locationKey');

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

    /** @var string */
    public $4;

    /** @var float */
    public $5;

    /** @var float */
    public $6;

    /** @var string[] */
    public $7;

    /** @var DateTime[] */
    public $8;

    /** @var AdFlag[] */
    public $9;

    /** @var DateTime */
    public $10;

    /** @var DateTime */
    public $11;


    /** @returns \norm\realms\db\Company */
    public function getCompany_() {
        if($this->Company_ === null) {
            $this->loadCompany_();
        }
        return $this->Company_;
    }


    protected function loadCompany_() {
        parent::loadProperty('Company_', 'company', 'key');
    }




    /**
     * @param $pk
     * @return Location
     */
    public static function getByPk($pk) {
        return parent::getByPk($pk);
    }

    /**
     * @param $where string The WHERE clause (excluding the word WHERE)
     * @param array $params The parameter count
     * @return Location
     */
    public static function getByWhere($where, $params = array()) {
        return parent::getByWhere($where, $params);
    }

    /**
     * @param $sql The complete sql statement with placeholders
     * @param array $params The parameter array to replace placeholders in the sql
     * @return Location
     */
    public static function getBySql($sql, $params = array()) {
        return parent::getBySql($sql, $params);
    }

}