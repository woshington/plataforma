<?php

App::uses('AppController', 'Controller');

class IndexController extends AppController {
	public $uses = array('Despesa', 'Orcamento');

	public $components = array('Paginator', 'Session');
	public $helpers = array('Form', 'Html', 'Time');

	public function beforeFilter() {
    	parent::beforeFilter();
    	$this->Auth->allow('index', 'orcamentos', 'despesas');    	
	}
	public function index(){
		$this->redirect(array('controller'=>'index', 'action'=>'orcamentos'));
	}

	public function orcamentos(){
		$this->paginate = array(
			'conditions'=>array(
				'Orcamento.ano'=>$this->ano
			),
			'limit'=>40
		);
		$orcamentos = $this->Paginator->paginate('Orcamento');
		$despesas = $this->Despesa->getDespesasPorOrcamento();
		$this->set(compact('orcamentos', 'despesas'));				
	}
	public function despesas(){
		$this->paginate = array(
			'conditions'=>array(
				'Orcamento.ano'=>$this->ano
			),
			'order'=>'Despesa.id desc ',
			'limit'=>40
		);
		$despesas = $this->Paginator->paginate('Despesa');		
		$this->set(compact('despesas'));		
	}
}
