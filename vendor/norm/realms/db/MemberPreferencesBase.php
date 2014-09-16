<?php
namespace norm\realms\db;

use norm\core\NormBaseObject;

class MemberPreferencesBase extends NormBaseObject {

    /** @var  string */
    protected static $primaryDatastoreName = 'mt';

    /** @var  string */
    protected static $cacheDatastoreName = '';

    /** @var  string */
    protected static $realm = 'db';

    /** @var  string */
    protected static $tableName = 'member_preferences';

    /** @var string[] */
    protected static $fieldNames = array('member_id', 'email_general', 'email_on_msg');

    /** @var string[] */
    protected static $fieldTypes = array('int', 'bool', 'bool');

    /** @var  string[] */
    protected static $propertyNames = array('memberId', 'emailGeneral', 'emailOnMsg');

    /** @var  string[] */
    protected static $primaryKeyFieldNames = array('member_id', 'member_id');

    /** @var  string[] */
    protected static $primaryKeyPropertyNames = array('memberId', 'memberId');

    /** @var  string[] */
    protected static $autoIncrementFieldName = '';

    /** @var  string[] */
    protected static $autoIncrementPropertyName = '';

    /** @var bool */
    protected static $hasPrimaryKey = true;

    /** @var bool */
    protected static $hasAutoIncrement = true;

    /** @var int */
    public $memberId;

    /** @var bool */
    public $emailGeneral;

    /** @var bool */
    public $emailOnMsg;


    /** @returns \norm\realms\db\Member */
    public function getMember() {
        if($this->Member === null) {
            $this->loadMember();
        }
        return $this->Member;
    }


    protected function loadMember() {
        parent::loadProperty('Member', 'member', 'id');
    }




    /**
     * @param $pk
     * @return MemberPreferences
     */
    public static function getByPk($pk) {
        return parent::getByPk($pk);
    }

    /**
     * @param $where string The WHERE clause (excluding the word WHERE)
     * @param array $params The parameter count
     * @return MemberPreferences
     */
    public static function getByWhere($where, $params = array()) {
        return parent::getByWhere($where, $params);
    }

    /**
     * @param $sql The complete sql statement with placeholders
     * @param array $params The parameter array to replace placeholders in the sql
     * @return MemberPreferences
     */
    public static function getBySql($sql, $params = array()) {
        return parent::getBySql($sql, $params);
    }

}