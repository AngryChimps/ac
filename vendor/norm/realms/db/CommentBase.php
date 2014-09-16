<?php
namespace norm\realms\db;

use norm\core\NormBaseObject;

class CommentBase extends NormBaseObject {

    /** @var  string */
    protected static $primaryDatastoreName = 'mt';

    /** @var  string */
    protected static $cacheDatastoreName = '';

    /** @var  string */
    protected static $realm = 'db';

    /** @var  string */
    protected static $tableName = 'comment';

    /** @var string[] */
    protected static $fieldNames = array('id', 'company_id', 'author_id', 'rating', 'text', 'created_at');

    /** @var string[] */
    protected static $fieldTypes = array('int', 'int', 'int', 'int', 'string', 'DateTime');

    /** @var  string[] */
    protected static $propertyNames = array('id', 'companyId', 'authorId', 'rating', 'text', 'createdAt');

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
    public $companyId;

    /** @var int */
    public $authorId;

    /** @var int */
    public $rating;

    /** @var string */
    public $text;

    /** @var DateTime */
    public $createdAt;


    /** @returns \norm\realms\db\Member */
    public function getAuthor() {
        if($this->Author === null) {
            $this->loadAuthor();
        }
        return $this->Author;
    }

    /** @returns \norm\realms\db\Company */
    public function getCompany() {
        if($this->Company === null) {
            $this->loadCompany();
        }
        return $this->Company;
    }


    protected function loadAuthor() {
        parent::loadProperty('Author', 'member', 'id');
    }

    protected function loadCompany() {
        parent::loadProperty('Company', 'company', 'id');
    }




    /**
     * @param $pk
     * @return Comment
     */
    public static function getByPk($pk) {
        return parent::getByPk($pk);
    }

    /**
     * @param $where string The WHERE clause (excluding the word WHERE)
     * @param array $params The parameter count
     * @return Comment
     */
    public static function getByWhere($where, $params = array()) {
        return parent::getByWhere($where, $params);
    }

    /**
     * @param $sql The complete sql statement with placeholders
     * @param array $params The parameter array to replace placeholders in the sql
     * @return Comment
     */
    public static function getBySql($sql, $params = array()) {
        return parent::getBySql($sql, $params);
    }

}