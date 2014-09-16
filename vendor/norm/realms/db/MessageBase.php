<?php
namespace norm\realms\db;

use norm\core\NormBaseObject;

class MessageBase extends NormBaseObject {

    /** @var  string */
    protected static $primaryDatastoreName = 'mt';

    /** @var  string */
    protected static $cacheDatastoreName = '';

    /** @var  string */
    protected static $realm = 'db';

    /** @var  string */
    protected static $tableName = 'message';

    /** @var string[] */
    protected static $fieldNames = array('id', 'ad_id', 'author_id', 'body', 'status', 'created_at');

    /** @var string[] */
    protected static $fieldTypes = array('int', 'int', 'int', 'string', 'int', 'DateTime');

    /** @var  string[] */
    protected static $propertyNames = array('id', 'adId', 'authorId', 'body', 'status', 'createdAt');

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

    /** @var int */
    public $authorId;

    /** @var string */
    public $body;

    /** @var int */
    public $status;

    /** @var DateTime */
    public $createdAt;


    /** @returns \norm\realms\db\Ad */
    public function getAd() {
        if($this->Ad === null) {
            $this->loadAd();
        }
        return $this->Ad;
    }

    /** @returns \norm\realms\db\Member */
    public function getAuthor() {
        if($this->Author === null) {
            $this->loadAuthor();
        }
        return $this->Author;
    }


    protected function loadAd() {
        parent::loadProperty('Ad', 'ad', 'id');
    }

    protected function loadAuthor() {
        parent::loadProperty('Author', 'member', 'id');
    }


    /** @returns \norm\realms\db\MessageFlag */
    public function getMessageFlagCollection() {
        if($this->MessageFlag === null) {
            $this->loadMessageFlag();
        }
        return $this->MessageFlag;
    }


    protected function loadMessageFlagCollection() {
        parent::loadPropertyCollection('MessageFlag', 'message_flag', 'message_id', 'messageId');
    }


    /**
     * @param $pk
     * @return Message
     */
    public static function getByPk($pk) {
        return parent::getByPk($pk);
    }

    /**
     * @param $where string The WHERE clause (excluding the word WHERE)
     * @param array $params The parameter count
     * @return Message
     */
    public static function getByWhere($where, $params = array()) {
        return parent::getByWhere($where, $params);
    }

    /**
     * @param $sql The complete sql statement with placeholders
     * @param array $params The parameter array to replace placeholders in the sql
     * @return Message
     */
    public static function getBySql($sql, $params = array()) {
        return parent::getBySql($sql, $params);
    }

}