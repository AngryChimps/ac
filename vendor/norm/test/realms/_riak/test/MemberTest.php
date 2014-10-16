<?php

namespace norm\test\realms\mysql;

use norm\test\realms\_riak\Member;
use norm\test\AbstractRiakTestCase;

class MemberTest extends AbstractRiakTestCase {
    /**
     * @return \norm\test\realms\_riak\Member
     */
    public static function getNewUnsavedObject() {
        $mem = new Member();
        $mem->key = 'bobbob' . microtime(true);
        $mem->first = 'Bob';
        $mem->last = 'Bobbington';
        $mem->email = 'test@test.com';

        return $mem;
    }

    public function testSaveNew() {
        $mem = self::getNewUnsavedObject();
        $mem->save();

        $bucket = $this->getObjectsBucket('member');
        $response = $bucket->get($mem->key);

        assertTrue($response->hasObject());

        $content = $response->getFirstObject();
        $dbObj = $content->getContent();
        $dbObjDecompressed = json_decode($dbObj);

        assertEquals($dbObjDecompressed->key, $mem->key);
    }

    public function testSaveExisting() {
        $mem = self::getNewUnsavedObject();
        $screenname = $mem->key;
        $mem->save();
        $mem->invalidate();

        $normObj = Member::getByPk($screenname);
        $normObj->firstname = 'Bill';
        $normObj->save();

        $bucket = $this->getObjectsBucket('member');
        $response = $bucket->get($screenname);

        assertTrue($response->hasObject());

        $content = $response->getFirstObject();
        $dbObj = $content->getContent();
        $dbObjDecompressed = json_decode($dbObj);

        assertEquals($dbObjDecompressed->key, $normObj->key);
    }
}