<?php
namespace norm\realms\;

use norm\core\NormBaseObject;

class TypesBase extends NormBaseObject {

    /** @var  string */
    protected static $primaryDatastoreName = '';

    /** @var  string */
    protected static $cacheDatastoreName = '';

    /** @var  string */
    protected static $realm = '';

    /** @var  string */
    protected static $tableName = 'types';

    /** @var string[] */
    protected static $fieldNames = array('id', 't_int', 't_tinyint', 't_smallint', 't_long', 't_double', 't_decimal', 't_bigint', 't_float', 't_mediumint', 't_bool', 't_boolean', 't_varchar_16', 't_char_8', 't_text', 't_mediumtext', 't_longtext', 't_datetime', 't_timestamp', 't_date');

    /** @var string[] */
    protected static $fieldTypes = array('int', 'int', 'tinyint', 'smallint', 'mediumtext', 'double', 'decimal', 'bigint', 'float', 'mediumint', 'tinyint', 'tinyint', 'varchar', 'char', 'text', 'mediumtext', 'longtext', 'datetime', 'timestamp', 'date');

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

    /** @var tinyint */
    public $tTinyint;

    /** @var smallint */
    public $tSmallint;

    /** @var mediumtext */
    public $tLong;

    /** @var double */
    public $tDouble;

    /** @var decimal */
    public $tDecimal;

    /** @var bigint */
    public $tBigint;

    /** @var float */
    public $tFloat;

    /** @var mediumint */
    public $tMediumint;

    /** @var tinyint */
    public $tBool;

    /** @var tinyint */
    public $tBoolean;

    /** @var varchar */
    public $tVarchar16;

    /** @var char */
    public $tChar8;

    /** @var text */
    public $tText;

    /** @var mediumtext */
    public $tMediumtext;

    /** @var longtext */
    public $tLongtext;

    /** @var datetime */
    public $tDatetime;

    /** @var timestamp */
    public $tTimestamp;

    /** @var date */
    public $tDate;



}