<?php
App::uses('AppController', 'Controller');
/**
 * Imagens Controller
 *
 * @property Imagen $Imagen
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ImagensController extends AppController {

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
		$this->Imagen->recursive = 0;
		$this->set('imagens', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Imagen->exists($id)) {
			throw new NotFoundException(__('Invalid imagen'));
		}
		$options = array('conditions' => array('Imagen.' . $this->Imagen->primaryKey => $id));
		$this->set('imagen', $this->Imagen->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Imagen->create();
			pr($this->request->data);
			if ($this->Imagen->save($this->request->data)) {
				$this->Session->setFlash(__('The imagen has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The imagen could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$albuns = $this->Imagen->Albun->find('list');
		$this->set(compact('albuns'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Imagen->exists($id)) {
			throw new NotFoundException(__('Invalid imagen'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Imagen->save($this->request->data)) {
				$this->Session->setFlash(__('The imagen has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The imagen could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Imagen.' . $this->Imagen->primaryKey => $id));
			$this->request->data = $this->Imagen->find('first', $options);
		}
		$albuns = $this->Imagen->Albun->find('list');
		$this->set(compact('albuns'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Imagen->id = $id;
		if (!$this->Imagen->exists()) {
			throw new NotFoundException(__('Invalid imagen'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Imagen->delete()) {
			$this->Session->setFlash(__('The imagen has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The imagen could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
