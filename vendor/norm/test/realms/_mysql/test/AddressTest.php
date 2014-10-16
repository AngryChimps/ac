<?php

namespace norm\test\realms\mysql;

use norm\test\realms\_mysql\Address;
use norm\test\AbstractMysqlTestCase;

require_once("../core/autoload.php");

class AddressTest extends AbstractMysqlTestCase {

    public static function getNewTestAddress() {
        $obj = new Address();
        $obj->street = 'street address';
        $obj->city = 'city here';
        $obj->state = 'ST';
        $obj->zip = 12345;

        return $obj;
    }

    public static function getNewTestAddressAfterSaving() {
        $addr = self::getNewTestAddress();
        $addr->save();
        return $addr;
    }

    /**
     * @depends getNewTestAddress
     * @param $addr Address
     * @return Address
     */
    public static function saveAddress(Address $addr) {
        $addr->save();
        return $addr;
    }

    public function testSaveNew()
    {
        $obj = self::getNewTestAddress();

        $currentRowCount = $this->getConnection()->getRowCount('address');

        $obj->save();

        assertEquals($currentRowCount + 1, $this->getConnection()->getRowCount('address'));
    }
}
 