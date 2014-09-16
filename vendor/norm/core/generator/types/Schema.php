<?php


namespace norm\core\generator\types;

use \norm\core\generator\types\Table;
use \norm\core\generator\types\Column;

class Schema {
    /** @var  string */
    public $dbname;

    /** @var Table[]  */
    public $tables = array();

    /** @var ForeignKey[] */
    public $foreignKeys = array();
} 