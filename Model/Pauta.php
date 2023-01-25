<?php

class Pauta extends AppModel {
    public $name = 'Pauta';
    public $actsAs = array('Containable');
    public $hasOne = array('Materia' => array(
        'className' => 'Materia',
        'order' => ('Pauta.data DESC'),
    ));
    public $hasMany = array('Comentapauta');
}
?>