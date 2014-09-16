<?php
namespace norm\realms\db;

use norm\core\NormBaseObject;

class MemberCompanyBase extends NormBaseObject {

    /** @var  string */
    protected static $primaryDatastoreName = 'mt';

    /** @var  string */
    protected static $cacheDatastoreName = '';

    /** @var  string */
    protected static $realm = 'db';

    /** @var  string */
    protected static $tableName = 'member_company';

    /** @var string[] */
    protected static $fieldNames = array('member_id', 'company_id', 'role', 'rating', 'is_blocked', 'created_at', 'updated_at');

    /** @var string[] */
    protected static $fieldTypes = array('int', 'int', 'int', 'int', 'bool', 'DateTime', 'DateTime');

    /** @var  string[] */
    protected static $propertyNames = array('memberId', 'companyId', 'role', 'rating', 'isBlocked', 'createdAt', 'updatedAt');

    /** @var  string[] */
    protected static $primaryKeyFieldNames = array('member_id', 'company_id', 'member_id', 'company_id');

    /** @var  string[] */
    protected static $primaryKeyPropertyNames = array('memberId', 'companyId', 'memberId', 'companyId');

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

    /** @var int */
    public $companyId;

    /** @var int */
    public $role;

    /** @var int */
    public $rating;

    /** @var bool */
    public $isBlocked;

    /** @var DateTime */
    public $createdAt;

    /** @var DateTime */
    public $updatedAt;


    /** @returns \norm\realms\db\Company */
    public function getCompany() {
        if($this->Company === null) {
            $this->loadCompany();
        }
        return $this->Company;
    }

    /** @returns \norm\realms\db\Member */
    public function getMember() {
        if($this->Member === null) {
            $this->loadMember();
        }
        return $this->Member;
    }


    protected function loadCompany() {
        parent::loadProperty('Company', 'company', 'id');
    }

    protected function loadMember() {
        parent::loadProperty('Member', 'member', 'id');
    }




    /**
     * @param $pk
     * @return MemberCompany
     */
    public static function getByPk($pk) {
        return parent::getByPk($pk);
    }

    /**
     * @param $where string The WHERE clause (excluding the word WHERE)
     * @param array $params The parameter count
     * @return MemberCompany
     */
    public static function getByWhere($where, $params = array()) {
        return parent::getByWhere($where, $params);
    }

    /**
     * @param $sql The complete sql statement with placeholders
     * @param array $params The parameter array to replace placeholders in the sql
     * @return MemberCompany
     */
    public static function getBySql($sql, $params = array()) {
        return parent::getBySql($sql, $params);
    }

}