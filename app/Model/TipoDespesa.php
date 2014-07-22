<?php
App::uses('AppModel', 'Model');
/**
 * TipoDespesa Model
 *
 * @property Despesa $Despesa
 */
class TipoDespesa extends AppModel {
	public $displayField = 'descricao';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Despesa' => array(
			'className' => 'Despesa',
			'foreignKey' => 'tipo_despesa_id',
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
