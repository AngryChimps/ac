<?php


namespace norm\core\generator\types;

use \norm\core\generator\types\Column;
use \norm\core\generator\types\ForeignKey;

class Enum {
    /** @var  string */
    public $name;

    /** @var  string[] */
    public $values;
}