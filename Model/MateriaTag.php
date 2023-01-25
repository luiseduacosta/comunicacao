<?php

class MateriaTag extends AppModel {

    public $name = 'MateriaTag';
    public $actsAs = array('Containable');
    public $belongsTo = array(
        'Materia', 'Tag'
    );

}

?>