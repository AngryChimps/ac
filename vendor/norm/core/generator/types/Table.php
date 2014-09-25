<?php


namespace norm\core\generator\types;

use \norm\core\generator\types\Column;
use \norm\core\generator\types\ForeignKey;
use \norm\core\generator\types\Enum;

class Table {
    /** @var  string */
    public $name;

    /** @var  string */
    public $comment;

    /** @var  string[] */
    public $primaryKeyNames = array();

    /** @var  string */
    public $autoIncrementName;

    /** @var Column[] */
    public $columns = array();

    /** @var ForeignKey[] */
    public $foreignKeys = array();

    /** @var ForeignKey[] */
    public $reverseForeignKeys = array();

    /** @var Enum[] */
    public $enums = array();

    const StatusEnumActive = 1;
}