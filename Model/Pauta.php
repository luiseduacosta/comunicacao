<?php

class Pauta extends AppModel {
    public $name = 'Pauta';
    public $hasOne = array('Materia' => array(
        'className' => 'Materia',
        'order' => ('Pauta.data DESC'),
    ));
    public $hasMany = array('Comentapauta');
}
?>