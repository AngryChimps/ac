<?php

namespace norm\realms\db/base;

use norm\core\NormBaseCollection;

class CompanyCollectionBase extends NormBaseCollection {
    protected static $tableName = 'company';
    protected static $singularClassName = 'Company';
    protected static $primaryKeyFieldNames = array('company_key');
    protected static $primaryKeyPropertyNames = array('companyKey');
    protected static $autoIncrementFieldName = '';
}