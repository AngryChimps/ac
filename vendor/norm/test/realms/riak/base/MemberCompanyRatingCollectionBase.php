<?php

namespace norm\realms\riak/base;

use norm\core\NormBaseCollection;

class MemberCompanyRatingCollectionBase extends NormBaseCollection {
    protected static $tableName = 'member_company_rating';
    protected static $singularClassName = 'MemberCompanyRating';
    protected static $primaryKeyFieldNames = array();
    protected static $primaryKeyPropertyNames = array();
    protected static $autoIncrementFieldName = '';
}