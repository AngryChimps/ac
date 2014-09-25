<?php

use \norm\realms\db\Person;

class Main extends CI_Controller {

    public function index() {
        $data = array();
        $data['content'] = 'bb';
        $this->load->view('main', array (
            'content' => $data,
        ));
    }

    public function testCreate() {
        $person = new Person();
        $person->name = 'BOB';
        $person->ssn = '234132392';
        $person->save();
        echo $person->id;
    }
}