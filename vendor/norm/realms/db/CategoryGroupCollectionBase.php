<?php

namespace norm\realms\db;

use norm\core\NormBaseCollection;

class CategoryGroupCollectionBase extends NormBaseCollection {
    protected static $tableName = 'category_group';
    protected static $singularClassName = 'CategoryGroup';
    protected static $primaryKeyFieldNames = array('id', 'id');
    protected static $primaryKeyPropertyNames = array('id', 'id');
    protected static $autoIncrementFieldName = 'id';
}