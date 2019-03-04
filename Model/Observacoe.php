<?php

class Observacoe extends AppModel {

    public $name = 'Observacoe';
    public $useTable = 'observacoes';
    public $belongsTo = array('Materia'
        => array(
            'className' => 'Materia',
            'foreignKey' => 'Materia_id'
    ));
    public $validate = array(
        'observacoes' => array(
            'required' => array(
                'rule' => 'notBlank',
                'mensage' => 'Digite seu comentário')),
        'autor' => array(
            'required' => array(
                'rule' => 'notBlank',
                'mensage' => 'Digite seu nome como autor do comentário da matéria')));

}

?>