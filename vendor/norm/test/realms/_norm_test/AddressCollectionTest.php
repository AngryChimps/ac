<?php


namespace norm\test\realms\_norm_test;

use norm\realms\_norm_test\Address;
use norm\realms\_norm_test\AddressCollection;

require_once("../core/autoload.php");

class AddressCollectionTest extends \norm\test\AbstractTestCase {

    public function testCreateNew() {
        $coll = new AddressCollection();

        for($i=0; $i<2; $i++) {
            $obj = new Address();
            $obj->street = 'street address ' . $i;
            $obj->city = 'city here';
            $obj->state = 'ST';
            $obj->zip = 12345;

            $coll[] = $obj;
        }

        assertEquals(2, count($coll));

        return $coll;
    }

    /**
     * @depends testCreateNew
     */
    public function testSaveNew(AddressCollection $coll) {
        $currentRowCount = $this->getConnection()->getRowCount('address');

        $coll->save();

        assertEquals($currentRowCount + 2, $this->getConnection()->getRowCount('address'));
    }
}
 