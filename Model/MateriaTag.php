<?php

class MateriaTag extends AppModel {
    public $name = 'MateriaTag';
    public $belongsTo = array(
        'Materia', 'Tag'
    );
}

?>