<?php
namespace norm\realms\db;

use norm\core\NormBaseObject;

class CategoryGroupBase extends NormBaseObject {

    /** @var  string */
    protected static $primaryDatastoreName = 'mt';

    /** @var  string */
    protected static $cacheDatastoreName = '';

    /** @var  string */
    protected static $realm = 'db';

    /** @var  string */
    protected static $tableName = 'category_group';

    /** @var string[] */
    protected static $fieldNames = array('id', 'name');

    /** @var string[] */
    protected static $fieldTypes = array('int', 'string');

    /** @var  string[] */
    protected static $propertyNames = array('id', 'name');

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

    /** @var string */
    public $name;




    /** @returns \norm\realms\db\Category */
    public function getCategoryCollection() {
        if($this->Category === null) {
            $this->loadCategory();
        }
        return $this->Category;
    }


    protected function loadCategoryCollection() {
        parent::loadPropertyCollection('Category', 'category', 'category_group_id', 'categoryGroupId');
    }


    /**
     * @param $pk
     * @return CategoryGroup
     */
    public static function getByPk($pk) {
        return parent::getByPk($pk);
    }

    /**
     * @param $where string The WHERE clause (excluding the word WHERE)
     * @param array $params The parameter count
     * @return CategoryGroup
     */
    public static function getByWhere($where, $params = array()) {
        return parent::getByWhere($where, $params);
    }

    /**
     * @param $sql The complete sql statement with placeholders
     * @param array $params The parameter array to replace placeholders in the sql
     * @return CategoryGroup
     */
    public static function getBySql($sql, $params = array()) {
        return parent::getBySql($sql, $params);
    }

}