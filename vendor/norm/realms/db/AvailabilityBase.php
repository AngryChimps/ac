<?php
namespace norm\realms\db;

use norm\core\NormBaseObject;

class AvailabilityBase extends NormBaseObject {

    /** @var  string */
    protected static $primaryDatastoreName = 'mt';

    /** @var  string */
    protected static $cacheDatastoreName = '';

    /** @var  string */
    protected static $realm = 'db';

    /** @var  string */
    protected static $tableName = 'availability';

    /** @var string[] */
    protected static $fieldNames = array('id', 'ad_id', 'starts_at', 'ends_at');

    /** @var string[] */
    protected static $fieldTypes = array('int', 'int', 'DateTime', 'DateTime');

    /** @var  string[] */
    protected static $propertyNames = array('id', 'adId', 'startsAt', 'endsAt');

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

    /** @var int */
    public $adId;

    /** @var DateTime */
    public $startsAt;

    /** @var DateTime */
    public $endsAt;


    /** @returns \norm\realms\db\Ad */
    public function getAd() {
        if($this->Ad === null) {
            $this->loadAd();
        }
        return $this->Ad;
    }


    protected function loadAd() {
        parent::loadProperty('Ad', 'ad', 'id');
    }




    /**
     * @param $pk
     * @return Availability
     */
    public static function getByPk($pk) {
        return parent::getByPk($pk);
    }

    /**
     * @param $where string The WHERE clause (excluding the word WHERE)
     * @param array $params The parameter count
     * @return Availability
     */
    public static function getByWhere($where, $params = array()) {
        return parent::getByWhere($where, $params);
    }

    /**
     * @param $sql The complete sql statement with placeholders
     * @param array $params The parameter array to replace placeholders in the sql
     * @return Availability
     */
    public static function getBySql($sql, $params = array()) {
        return parent::getBySql($sql, $params);
    }

}