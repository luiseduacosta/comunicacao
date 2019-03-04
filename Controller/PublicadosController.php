<?php

class PublicadosController extends AppController {
    public $helpers = array ('Html','Form');
    public $name = 'Publicados';

    function index() {
	$this->set('publicados', $this->Publicado->find('all'));
    }
}

?>