<?php


namespace norm\test\realms\_norm_test;

use norm\realms\_norm_test\Address;
use norm\test\AbstractTestCase;

require_once("../core/autoload.php");

class AddressTest extends AbstractTestCase {

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
 