<?php

class Materia extends AppModel {

    public $name = 'Materia';
    public $actsAs = array('Containable');
    
    public $belongsTo = array('Pauta'
        => array(
            'className' => 'Pauta',
            'foreignKey' => 'Pauta_id'
    ));
    
    public $hasMany = array('Observacoe'
        => array(
            'className' => 'Observacoe',
            'foreignKey' => 'Materia_id'
    ));
    
    public $hasAndBelongsToMany = array('Tag');
    
    // public $hasAndBelongsToMany = array('Materia' => array('with' => 'Tag'));

}

?>