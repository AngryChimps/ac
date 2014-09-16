<?php


namespace norm\test\realms\_norm_test;

use norm\test\AbstractTestCase;
use norm\realms\_norm_test\Types;

require_once("../core/autoload.php");

class TypesTest extends AbstractTestCase {
    public function testTypes() {
        $types = Types::getByPk(1);

        foreach($types as $prop => $val) {
            switch($prop) {
                case 'tInt':
                    assertEquals('integer', gettype($types->$prop));
                    break;
                case 'tTinyint':
                    assertEquals('boolean', gettype($types->$prop));
            }
        }
    }
} 