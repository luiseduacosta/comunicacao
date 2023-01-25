<?php

App::uses('AppModel', 'Model');

/**
 * Historico Model
 *
 * @property Ssindical $Ssindical
 */
class Historico extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'ano';
    public $actsAs = array('Containable');
    // The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Ssindical' => array(
            'className' => 'Ssindical',
            'foreignKey' => 'ssindical_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
