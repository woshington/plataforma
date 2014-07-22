<?php
App::uses('AppController', 'Controller');
/**
 * Albuns Controller
 *
 * @property Albun $Albun
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AlbunsController extends AppController {

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
		$this->Albun->recursive = 0;
		$this->set('albuns', $this->Paginator->paginate());
	}

	public function lista(){
		$albuns = $this->Albun->find(
			'all',
			array(
				'contain'=>array(
					'Imagen'=>array(
						'limit'=>1
					)
				)
			)
		);
		$this->set('albuns', $albuns);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout = 'galeria';
		if (!$this->Albun->exists($id)) {
			throw new NotFoundException(__('Invalid albun'));
		}
		$options = array('conditions' => array('Albun.' . $this->Albun->primaryKey => $id));
		$this->set('albun', $this->Albun->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Albun->create();
			if ($this->Albun->save($this->request->data)) {
				$this->Session->setFlash(__('The albun has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The albun could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->Albun->exists($id)) {
			throw new NotFoundException(__('Invalid albun'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Albun->save($this->request->data)) {
				$this->Session->setFlash(__('The albun has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The albun could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Albun.' . $this->Albun->primaryKey => $id));
			$this->request->data = $this->Albun->find('first', $options);
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
		$this->Albun->id = $id;
		if (!$this->Albun->exists()) {
			throw new NotFoundException(__('Invalid albun'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Albun->delete()) {
			$this->Session->setFlash(__('The albun has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The albun could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
