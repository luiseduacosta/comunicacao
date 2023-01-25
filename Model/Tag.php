<?php

class Tag extends AppModel {

    public $name = 'Tag';
    public $actsAs = array('Containable');
    public $hasAndBelongsToMany = array('Materia');

}

?>