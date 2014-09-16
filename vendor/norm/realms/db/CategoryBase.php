<?php
namespace norm\realms\db;

use norm\core\NormBaseObject;

class CategoryBase extends NormBaseObject {

    /** @var  string */
    protected static $primaryDatastoreName = 'mt';

    /** @var  string */
    protected static $cacheDatastoreName = '';

    /** @var  string */
    protected static $realm = 'db';

    /** @var  string */
    protected static $tableName = 'category';

    /** @var string[] */
    protected static $fieldNames = array('id', 'category_group_id', 'name');

    /** @var string[] */
    protected static $fieldTypes = array('int', 'int', 'string');

    /** @var  string[] */
    protected static $propertyNames = array('id', 'categoryGroupId', 'name');

    /** @var  string[] */
    protected static $primaryKeyFieldNames = array('id', 'id');

    /** @var  string[] */
    protected static $primaryKeyPropertyNames = array('id', 'id');

    /** @var  string[] */
    protected static $autoIncrementFieldName = '';

    /** @var  string[] */
    protected static $autoIncrementPropertyName = '';

    /** @var bool */
    protected static $hasPrimaryKey = true;

    /** @var bool */
    protected static $hasAutoIncrement = true;

    /** @var int */
    public $id;

    /** @var int */
    public $categoryGroupId;

    /** @var string */
    public $name;


    /** @returns \norm\realms\db\CategoryGroup */
    public function getCategory_group() {
        if($this->Category_group === null) {
            $this->loadCategory_group();
        }
        return $this->Category_group;
    }


    protected function loadCategory_group() {
        parent::loadProperty('Category_group', 'category_group', 'id');
    }


    /** @returns \norm\realms\db\Ad */
    public function getAdCollection() {
        if($this->Ad === null) {
            $this->loadAd();
        }
        return $this->Ad;
    }


    protected function loadAdCollection() {
        parent::loadPropertyCollection('Ad', 'ad', 'category_id', 'categoryId');
    }


    /**
     * @param $pk
     * @return Category
     */
    public static function getByPk($pk) {
        return parent::getByPk($pk);
    }

    /**
     * @param $where string The WHERE clause (excluding the word WHERE)
     * @param array $params The parameter count
     * @return Category
     */
    public static function getByWhere($where, $params = array()) {
        return parent::getByWhere($where, $params);
    }

    /**
     * @param $sql The complete sql statement with placeholders
     * @param array $params The parameter array to replace placeholders in the sql
     * @return Category
     */
    public static function getBySql($sql, $params = array()) {
        return parent::getBySql($sql, $params);
    }

}