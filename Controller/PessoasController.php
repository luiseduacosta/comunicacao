<?php

class PessoasController extends AppController {
    public $helpers = array ('Html','Form');
    public $name = 'Pessoas';

    function index() {
	$this->set('pessoas', $this->Pessoa->find('all'));
    }
}

?>