<?php
namespace norm\realms\db;

use norm\core\NormBaseObject;

class AdBase extends NormBaseObject {

    /** @var  string */
    protected static $primaryDatastoreName = 'mt';

    /** @var  string */
    protected static $cacheDatastoreName = '';

    /** @var  string */
    protected static $realm = 'db';

    /** @var  string */
    protected static $tableName = 'ad';

    /** @var string[] */
    protected static $fieldNames = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17');

    /** @var string[] */
    protected static $fieldTypes = array('string', 'string', 'string', 'string', 'string', 'string', 'string', 'int', 'int', 'int', 'decimal', 'float', 'string', 'int', 'string[]', 'AdStatus', 'DateTime', 'DateTime');

    /** @var  string[] */
    protected static $propertyNames = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17');

    /** @var  string[] */
    protected static $primaryKeyFieldNames = array('ad_key');

    /** @var  string[] */
    protected static $primaryKeyPropertyNames = array('adKey');

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

    /** @var string */
    public $5;

    /** @var string */
    public $6;

    /** @var int */
    public $7;

    /** @var int */
    public $8;

    /** @var int */
    public $9;

    /** @var decimal */
    public $10;

    /** @var float */
    public $11;

    /** @var string */
    public $12;

    /** @var int */
    public $13;

    /** @var string[] */
    public $14;

    /** @var AdStatus */
    public $15;

    /** @var DateTime */
    public $16;

    /** @var DateTime */
    public $17;




    /** @returns \norm\realms\db\AdFlag */
    public function getAdFlagCollection() {
        if($this->AdFlag === null) {
            $this->loadAdFlag();
        }
        return $this->AdFlag;
    }


    protected function loadAdFlagCollection() {
        parent::loadPropertyCollection('AdFlag', 'ad_flag', 'ad_key', 'adKey');
    }


    /**
     * @param $pk
     * @return Ad
     */
    public static function getByPk($pk) {
        return parent::getByPk($pk);
    }

    /**
     * @param $where string The WHERE clause (excluding the word WHERE)
     * @param array $params The parameter count
     * @return Ad
     */
    public static function getByWhere($where, $params = array()) {
        return parent::getByWhere($where, $params);
    }

    /**
     * @param $sql The complete sql statement with placeholders
     * @param array $params The parameter array to replace placeholders in the sql
     * @return Ad
     */
    public static function getBySql($sql, $params = array()) {
        return parent::getBySql($sql, $params);
    }

}