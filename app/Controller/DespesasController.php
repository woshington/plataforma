<?php
App::uses('AppController', 'Controller');
/**
 * Despesas Controller
 *
 * @property Despesa $Despesa
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DespesasController extends AppController {

	public $uses = array('Despesa', 'Orcamento');

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Despesa->recursive = 0;
		$this->set('despesas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Despesa->exists($id)) {
			throw new NotFoundException(__('Invalid despesa'));
		}
		$options = array('conditions' => array('Despesa.' . $this->Despesa->primaryKey => $id));
		$this->set('despesa', $this->Despesa->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Despesa->create();
			if ($this->Despesa->save($this->request->data)) {
				$this->Session->setFlash(__('The despesa has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The despesa could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$tipoDespesas = $this->Despesa->TipoDespesa->find('list');
		$listOrcamentos = $this->Orcamento->find('all', array(
			'conditions'=>array(
				'Orcamento.ano'=>$_SESSION['ano']
			)
		));

		$this->Despesa->virtualFields = array('valor' => 'SUM(Despesa.valor)');
		$despesas = $this->Despesa->find('all', array(
			'fields'=>array('valor', 'Orcamento.id'),
			'conditions'=>array(	
				'Orcamento.ano'=>$_SESSION['ano']
			)

		));
		$listDespesas = array();
		foreach ($despesas as $key => $despesa) {			
			$listDespesas[$despesa['Orcamento']['id']] = $despesa['Despesa']['valor'];
		}
		$orcamentos = array();
		foreach ($listOrcamentos as $key => $orcamento) {			
			$valor = CakeNumber::currency($orcamento['Orcamento']['valor']-@$listDespesas[$orcamento['Orcamento']['id']], 'BRL');			
			$orcamentos[$orcamento['Orcamento']['id']] = $orcamento['Categoria']['descricao']." - ".$valor;
		}		
		$this->set(compact('tipoDespesas', 'orcamentos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Despesa->exists($id)) {
			throw new NotFoundException(__('Invalid despesa'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Despesa->save($this->request->data)) {
				$this->Session->setFlash(__('The despesa has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The despesa could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Despesa.' . $this->Despesa->primaryKey => $id));
			$this->request->data = $this->Despesa->find('first', $options);
		}
		$tipoDespesas = $this->Despesa->TipoDespesa->find('list');
		$listOrcamentos = $this->Orcamento->find('all', array(
			'conditions'=>array(
				'Orcamento.ano'=>$_SESSION['ano']
			)
		));

		$this->Despesa->virtualFields = array('valor' => 'SUM(Despesa.valor)');
		$despesas = $this->Despesa->find('all', array(
			'fields'=>array('valor', 'Orcamento.id'),
			'conditions'=>array(	
				'Orcamento.ano'=>$_SESSION['ano']
			)

		));
		$listDespesas = array();
		foreach ($despesas as $key => $despesa) {			
			$listDespesas[$despesa['Orcamento']['id']] = $despesa['Despesa']['valor'];
		}
		$orcamentos = array();
		foreach ($listOrcamentos as $key => $orcamento) {			
			$valor = CakeNumber::currency($orcamento['Orcamento']['valor']-$listDespesas[$orcamento['Orcamento']['id']], 'BRL');			
			$orcamentos[$orcamento['Orcamento']['id']] = $orcamento['Categoria']['descricao']." - ".$valor;
		}		
		$this->set(compact('tipoDespesas', 'orcamentos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Despesa->id = $id;
		if (!$this->Despesa->exists()) {
			throw new NotFoundException(__('Invalid despesa'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Despesa->delete()) {
			$this->Session->setFlash(__('The despesa has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The despesa could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
