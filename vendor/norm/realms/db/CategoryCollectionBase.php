<?php

namespace norm\realms\db;

use norm\core\NormBaseCollection;

class CategoryCollectionBase extends NormBaseCollection {
    protected static $tableName = 'category';
    protected static $singularClassName = 'Category';
    protected static $primaryKeyFieldNames = array('id', 'id');
    protected static $primaryKeyPropertyNames = array('id', 'id');
    protected static $autoIncrementFieldName = '';
}