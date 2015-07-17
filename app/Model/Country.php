<?php
App::uses('AppModel', 'Model');
/**
 * Country Model
 *
 * @property Region $Region
 */
class Country extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'maxLength' => array(
				'rule' => array('maxLength')
            )
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Region' => array(
			'className' => 'Region',
			'foreignKey' => 'continent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
