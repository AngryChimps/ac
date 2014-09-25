<?php
namespace norm\realms\db\base;

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
    protected static $fieldNames = array('member_key', 'email', 'password', 'first', 'last', 'dob', 'photo', 'address', 'lat', 'long', 'status', 'blocked_company_keys', 'managed_company_keys', 'ad_flag_keys', 'message_flag_keys', 'created_at', 'updated_at');

    /** @var string[] */
    protected static $fieldTypes = array('string', 'string', 'string', 'string', 'string', 'Date', 'string', 'sring', 'float', 'float', 'MemberStatus', 'string[]', 'string[]', 'string[]', 'string[]', 'DateTime', 'DateTime');

    /** @var  string[] */
    protected static $propertyNames = array('memberKey', 'email', 'password', 'first', 'last', 'dob', 'photo', 'address', 'lat', 'long', 'status', 'blockedCompanyKeys', 'managedCompanyKeys', 'adFlagKeys', 'messageFlagKeys', 'createdAt', 'updatedAt');

    /** @var  string[] */
    protected static $primaryKeyFieldNames = array('member_key');

    /** @var  string[] */
    protected static $primaryKeyPropertyNames = array('memberKey');

    /** @var  string[] */
    protected static $autoIncrementFieldName = '';

    /** @var  string[] */
    protected static $autoIncrementPropertyName = '';

    /** @var bool */
    protected static $hasPrimaryKey = true;

    /** @var bool */
    protected static $hasAutoIncrement = true;


    /** @var string */
    public $memberKey;

    /** @var string */
    public $email;

    /** @var string */
    public $password;

    /** @var string */
    public $first;

    /** @var string */
    public $last;

    /** @var Date */
    public $dob;

    /** @var string */
    public $photo;

    /** @var sring */
    public $address;

    /** @var float */
    public $lat;

    /** @var float */
    public $long;

    /** @var MemberStatus */
    public $status;

    /** @var string[] */
    public $blockedCompanyKeys;

    /** @var string[] */
    public $managedCompanyKeys;

    /** @var string[] */
    public $adFlagKeys;

    /** @var string[] */
    public $messageFlagKeys;

    /** @var DateTime */
    public $createdAt;

    /** @var DateTime */
    public $updatedAt;




    /** @returns \norm\realms\db\AdFlag */
    public function getAdFlagCollection() {
        if($this->AdFlag === null) {
            $this->loadAdFlag();
        }
        return $this->AdFlag;
    }

    /** @returns \norm\realms\db\Message */
    public function getMessageCollection() {
        if($this->Message === null) {
            $this->loadMessage();
        }
        return $this->Message;
    }

    /** @returns \norm\realms\db\Comment */
    public function getCommentCollection() {
        if($this->Comment === null) {
            $this->loadComment();
        }
        return $this->Comment;
    }

    /** @returns \norm\realms\db\MessageFlag */
    public function getMessageFlagCollection() {
        if($this->MessageFlag === null) {
            $this->loadMessageFlag();
        }
        return $this->MessageFlag;
    }


    protected function loadAdFlagCollection() {
        parent::loadPropertyCollection('AdFlag', 'ad_flag', 'author_key', 'authorKey');
    }

    protected function loadMessageCollection() {
        parent::loadPropertyCollection('Message', 'message', 'author_key', 'authorKey');
    }

    protected function loadCommentCollection() {
        parent::loadPropertyCollection('Comment', 'comment', 'member_key', 'memberKey');
    }

    protected function loadMessageFlagCollection() {
        parent::loadPropertyCollection('MessageFlag', 'message_flag', 'author_key', 'authorKey');
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