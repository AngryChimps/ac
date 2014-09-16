<?php
namespace norm\realms\db;

use norm\core\NormBaseObject;

class AdFlagBase extends NormBaseObject {

    /** @var  string */
    protected static $primaryDatastoreName = 'mt';

    /** @var  string */
    protected static $cacheDatastoreName = '';

    /** @var  string */
    protected static $realm = 'db';

    /** @var  string */
    protected static $tableName = 'ad_flag';

    /** @var string[] */
    protected static $fieldNames = array('0', '1', '2', '3', '4');

    /** @var string[] */
    protected static $fieldTypes = array('string', 'string', 'string', 'int', 'DateTime');

    /** @var  string[] */
    protected static $propertyNames = array('0', '1', '2', '3', '4');

    /** @var  string[] */
    protected static $primaryKeyFieldNames = array('ad_key', 'author_key');

    /** @var  string[] */
    protected static $primaryKeyPropertyNames = array('adKey', 'authorKey');

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

    /** @var int */
    public $3;

    /** @var DateTime */
    public $4;


    /** @returns \norm\realms\db\Ad */
    public function getAd_() {
        if($this->Ad_ === null) {
            $this->loadAd_();
        }
        return $this->Ad_;
    }

    /** @returns \norm\realms\db\Member */
    public function getAuthor_() {
        if($this->Author_ === null) {
            $this->loadAuthor_();
        }
        return $this->Author_;
    }


    protected function loadAd_() {
        parent::loadProperty('Ad_', 'ad', 'key');
    }

    protected function loadAuthor_() {
        parent::loadProperty('Author_', 'member', 'key');
    }




    /**
     * @param $pk
     * @return AdFlag
     */
    public static function getByPk($pk) {
        return parent::getByPk($pk);
    }

    /**
     * @param $where string The WHERE clause (excluding the word WHERE)
     * @param array $params The parameter count
     * @return AdFlag
     */
    public static function getByWhere($where, $params = array()) {
        return parent::getByWhere($where, $params);
    }

    /**
     * @param $sql The complete sql statement with placeholders
     * @param array $params The parameter array to replace placeholders in the sql
     * @return AdFlag
     */
    public static function getBySql($sql, $params = array()) {
        return parent::getBySql($sql, $params);
    }

}