<?php
namespace norm\realms\_norm_test;

use norm\core\NormBaseObject;

class TypesBase extends NormBaseObject {

    /** @var  string */
    protected static $primaryDatastoreName = '_norm_test_mt';

    /** @var  string */
    protected static $cacheDatastoreName = '';

    /** @var  string */
    protected static $realm = '_norm_test';

    /** @var  string */
    protected static $tableName = 'types';

    /** @var string[] */
    protected static $fieldNames = array('id', 't_int', 't_tinyint', 't_smallint', 't_long', 't_double', 't_decimal', 't_bigint', 't_float', 't_mediumint', 't_bool', 't_boolean', 't_varchar_16', 't_char_8', 't_text', 't_mediumtext', 't_longtext', 't_datetime', 't_timestamp', 't_date');

    /** @var string[] */
    protected static $fieldTypes = array('int', 'int', 'int', 'int', 'string', 'float', 'float', 'int', 'float', 'int', 'bool', 'bool', 'string', 'string', 'string', 'string', 'string', 'DateTime', 'DateTime', 'DateTime');

    /** @var  string[] */
    protected static $propertyNames = array('id', 'tInt', 'tTinyint', 'tSmallint', 'tLong', 'tDouble', 'tDecimal', 'tBigint', 'tFloat', 'tMediumint', 'tBool', 'tBoolean', 'tVarchar16', 'tChar8', 'tText', 'tMediumtext', 'tLongtext', 'tDatetime', 'tTimestamp', 'tDate');

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
    public $tInt;

    /** @var int */
    public $tTinyint;

    /** @var int */
    public $tSmallint;

    /** @var string */
    public $tLong;

    /** @var float */
    public $tDouble;

    /** @var float */
    public $tDecimal;

    /** @var int */
    public $tBigint;

    /** @var float */
    public $tFloat;

    /** @var int */
    public $tMediumint;

    /** @var bool */
    public $tBool;

    /** @var bool */
    public $tBoolean;

    /** @var string */
    public $tVarchar16;

    /** @var string */
    public $tChar8;

    /** @var string */
    public $tText;

    /** @var string */
    public $tMediumtext;

    /** @var string */
    public $tLongtext;

    /** @var DateTime */
    public $tDatetime;

    /** @var DateTime */
    public $tTimestamp;

    /** @var DateTime */
    public $tDate;





}