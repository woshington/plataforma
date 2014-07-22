<?php
App::uses('AppModel', 'Model');
/**
 * Despesa Model
 *
 * @property TipoDespesa $TipoDespesa
 * @property Orcamento $Orcamento
 */
class Despesa extends AppModel {	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'tipo_despesa_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'orcamento_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'TipoDespesa' => array(
			'className' => 'TipoDespesa',
			'foreignKey' => 'tipo_despesa_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Orcamento' => array(
			'className' => 'Orcamento',
			'foreignKey' => 'orcamento_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	public function getDespesasPorOrcamento(){
		$this->virtualFields = array('valor' => 'SUM(Despesa.valor)');
		$despesas = $this->find('all', array(
			'fields'=>array('valor', 'Orcamento.id'),
			'conditions'=>array(
				'Orcamento.ano'=>$this->ano
			),
			'group'=>'Despesa.orcamento_id'

		));
		$listDespesas = array();		
		foreach ($despesas as $key => $despesa) {			
			$listDespesas[$despesa['Orcamento']['id']] = $despesa['Despesa']['valor'];
		}
		return $listDespesas;
	}
}
