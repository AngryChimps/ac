<?php


namespace norm\core\generator\types;


class ForeignKey {
    public $name;
    public $tableName;
    public $columnName;
    public $position;
    public $referencedTableName;
    public $referencedColumnName;
} 