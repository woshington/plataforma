<?php
App::uses('AppController', 'Controller');
/**
 * TipoDespesas Controller
 *
 * @property TipoDespesa $TipoDespesa
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TipoDespesasController extends AppController {

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
		$this->TipoDespesa->recursive = 0;
		$this->set('tipoDespesas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TipoDespesa->exists($id)) {
			throw new NotFoundException(__('Invalid tipo despesa'));
		}
		$options = array('conditions' => array('TipoDespesa.' . $this->TipoDespesa->primaryKey => $id));
		$this->set('tipoDespesa', $this->TipoDespesa->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TipoDespesa->create();
			if ($this->TipoDespesa->save($this->request->data)) {
				$this->Session->setFlash(__('The tipo despesa has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipo despesa could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TipoDespesa->exists($id)) {
			throw new NotFoundException(__('Invalid tipo despesa'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TipoDespesa->save($this->request->data)) {
				$this->Session->setFlash(__('The tipo despesa has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipo despesa could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('TipoDespesa.' . $this->TipoDespesa->primaryKey => $id));
			$this->request->data = $this->TipoDespesa->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->TipoDespesa->id = $id;
		if (!$this->TipoDespesa->exists()) {
			throw new NotFoundException(__('Invalid tipo despesa'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TipoDespesa->delete()) {
			$this->Session->setFlash(__('The tipo despesa has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The tipo despesa could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
