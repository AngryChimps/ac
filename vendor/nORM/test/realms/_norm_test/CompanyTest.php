<?php


namespace norm\test\realms\_norm_test;

use norm\realms\_norm_test\Company;
use norm\realms\_norm_test\Address;
use norm\test\AbstractTestCase;

require_once("../core/autoload.php");

class CompanyTest extends AbstractTestCase {

    /**
     * @depends AddressTest::saveAddress
     * @return Company
     */
    public static function getNewTestCompany() {
        $addr = AddressTest::getNewTestAddressAfterSaving();
        $comp = new Company();
        $comp->addressId = $addr->id;
        $comp->name = 'Company Name';

        return $comp;
    }

    /**
     * @depends getNewTestCompany
     * @return Company
     */
    public static function getNewTestCompanyAfterSaving() {
        $comp = self::getNewTestCompany(AddressTest::getNewTestAddress());
        $comp->save();
        return $comp;
    }

    public function testSaveNew()
    {
        $comp = self::getNewTestCompany(AddressTest::getNewTestAddress());
        $currentRowCount = $this->getConnection()->getRowCount('company');

        $comp->save();

        assertEquals($currentRowCount + 1, $this->getConnection()->getRowCount('company'));
    }

    /**
     * Primary keys and non-primary keys are handled differently in saving, this function makes sure that after
     * saving an object with an auto-increment primary key, that key is typed as an integer.
     */
    public function testIntegerPkType() {
        $comp = self::getNewTestCompanyAfterSaving(AddressTest::getNewTestAddress());

        assertEquals(gettype($comp->id), 'integer');
    }

    /**
     * Primary keys and non-primary keys are handled differently in saving, this function makes sure that after
     * saving an object with an integer key other than an auto-increment key, that key is typed as an integer.
     */
    public function testIntegerNonPkType() {
        $comp = self::getNewTestCompanyAfterSaving(AddressTest::getNewTestAddress());
        assertEquals(gettype($comp->addressId), 'integer');
    }
}
 