<?php

App::uses('AppModel', 'Model');

/**
 * Ssindicai Model
 *
 * @property historicos $historicos
 */
class Ssindical extends AppModel {

    /**
     * Primary key field
     *
     * @var string
     */
    public $primaryKey = 'Id';

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'Secao_sindical';
    // The Associations below have been created with all possible keys, those that are not needed can be removed

    public $actsAs = array('Containable');

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'historicos' => array(
            'className' => 'historicos',
            'foreignKey' => 'ssindical_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

}
