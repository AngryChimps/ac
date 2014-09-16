<?php
namespace norm\realms\db;

use norm\core\NormBaseObject;

class MemberBase extends NormBaseObject {

    /** @var  string */
    protected static $primaryDatastoreName = 'mt';

    /** @var  string */
    protected static $cacheDatastoreName = '';

    /** @var  string */
    protected static $realm = 'db';

    /** @var  string */
    protected static $tableName = 'member';

    /** @var string[] */
    protected static $fieldNames = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15');

    /** @var string[] */
    protected static $fieldTypes = array('string', 'string', 'string', 'string', 'string', 'Date', 'string', 'sring', 'float', 'float', 'MemberStatus', 'string[]', 'string[]', 'string[]', 'DateTime', 'DateTime');

    /** @var  string[] */
    protected static $propertyNames = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15');

    /** @var  string[] */
    protected static $primaryKeyFieldNames = array();

    /** @var  string[] */
    protected static $primaryKeyPropertyNames = array();

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

    /** @var Date */
    public $5;

    /** @var string */
    public $6;

    /** @var sring */
    public $7;

    /** @var float */
    public $8;

    /** @var float */
    public $9;

    /** @var MemberStatus */
    public $10;

    /** @var string[] */
    public $11;

    /** @var string[] */
    public $12;

    /** @var string[] */
    public $13;

    /** @var DateTime */
    public $14;

    /** @var DateTime */
    public $15;




    /** @returns \norm\realms\db\AdFlag */
    public function getAdFlagCollection() {
        if($this->AdFlag === null) {
            $this->loadAdFlag();
        }
        return $this->AdFlag;
    }


    protected function loadAdFlagCollection() {
        parent::loadPropertyCollection('AdFlag', 'ad_flag', 'author_key', 'authorKey');
    }


    /**
     * @param $pk
     * @return Member
     */
    public static function getByPk($pk) {
        return parent::getByPk($pk);
    }

    /**
     * @param $where string The WHERE clause (excluding the word WHERE)
     * @param array $params The parameter count
     * @return Member
     */
    public static function getByWhere($where, $params = array()) {
        return parent::getByWhere($where, $params);
    }

    /**
     * @param $sql The complete sql statement with placeholders
     * @param array $params The parameter array to replace placeholders in the sql
     * @return Member
     */
    public static function getBySql($sql, $params = array()) {
        return parent::getBySql($sql, $params);
    }

}