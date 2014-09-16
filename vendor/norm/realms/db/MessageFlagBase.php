<?php
namespace norm\realms\db;

use norm\core\NormBaseObject;

class MessageFlagBase extends NormBaseObject {

    /** @var  string */
    protected static $primaryDatastoreName = 'mt';

    /** @var  string */
    protected static $cacheDatastoreName = '';

    /** @var  string */
    protected static $realm = 'db';

    /** @var  string */
    protected static $tableName = 'message_flag';

    /** @var string[] */
    protected static $fieldNames = array('id', 'ad_id', 'author_id', 'message_id', 'type', 'body', 'created_at');

    /** @var string[] */
    protected static $fieldTypes = array('int', 'int', 'int', 'int', 'int', 'string', 'DateTime');

    /** @var  string[] */
    protected static $propertyNames = array('id', 'adId', 'authorId', 'messageId', 'type', 'body', 'createdAt');

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

    /** @var int */
    public $messageId;

    /** @var int */
    public $type;

    /** @var string */
    public $body;

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

    /** @returns \norm\realms\db\Message */
    public function getMessage() {
        if($this->Message === null) {
            $this->loadMessage();
        }
        return $this->Message;
    }


    protected function loadAd() {
        parent::loadProperty('Ad', 'ad', 'id');
    }

    protected function loadAuthor() {
        parent::loadProperty('Author', 'member', 'id');
    }

    protected function loadMessage() {
        parent::loadProperty('Message', 'message', 'id');
    }




    /**
     * @param $pk
     * @return MessageFlag
     */
    public static function getByPk($pk) {
        return parent::getByPk($pk);
    }

    /**
     * @param $where string The WHERE clause (excluding the word WHERE)
     * @param array $params The parameter count
     * @return MessageFlag
     */
    public static function getByWhere($where, $params = array()) {
        return parent::getByWhere($where, $params);
    }

    /**
     * @param $sql The complete sql statement with placeholders
     * @param array $params The parameter array to replace placeholders in the sql
     * @return MessageFlag
     */
    public static function getBySql($sql, $params = array()) {
        return parent::getBySql($sql, $params);
    }

}