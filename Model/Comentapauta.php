<?php

class Comentapauta extends AppModel {

    public $name = 'Comentapauta';
    public $useTable = 'comentapautas';
    public $belongsTo = array('Pauta'
        => array(
            'className' => 'Pauta',
            'foreignKey' => 'pauta_id'
    ));
    public $validate = array(
        'comentario' => array(
            'required' => array(
                'rule' => 'notBlank',
                'mensage' => 'Digite seu comentário')),
        'autor' => array(
            'required' => array(
                'rule' => 'notBlank',
                'mensage' => 'Digite seu nome como autor do comentário da pauta')));

}

?>