<?php
App::uses('AppController', 'Controller');
/**
 * Memorandos Controller
 *
 * @property Memorando $Memorando
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MemorandosController extends AppController {

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
		$this->Memorando->recursive = 0;
		$this->Memorando->order = 'Memorando.numero desc';
		$this->set('memorandos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Memorando->exists($id)) {
			throw new NotFoundException(__('Invalid memorando'));
		}
		$options = array('conditions' => array('Memorando.' . $this->Memorando->primaryKey => $id));
		$this->set('memorando', $this->Memorando->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Memorando->create();
			$this->request->data['Memorando']['user_id'] = $this->Session->read('Auth.User.id');			
			$this->request->data['Memorando']['ano'] = $this->ano;
			if ($this->Memorando->save($this->request->data)) {
				$this->Session->setFlash(__('The memorando has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The memorando could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$memo = $this->Memorando->find('first', array(
			'conditions'=>array(
				'Memorando.ano'=>$this->ano
			),
			'order'=>'numero desc'
		));
		$users = $this->Memorando->User->find('list');
		$this->set(compact('users', 'memo'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Memorando->exists($id)) {
			throw new NotFoundException(__('Invalid memorando'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Memorando->save($this->request->data)) {
				$this->Session->setFlash(__('The memorando has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The memorando could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Memorando.' . $this->Memorando->primaryKey => $id));
			$this->request->data = $this->Memorando->find('first', $options);
		}
		$users = $this->Memorando->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Memorando->id = $id;
		if (!$this->Memorando->exists()) {
			throw new NotFoundException(__('Invalid memorando'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Memorando->delete()) {
			$this->Session->setFlash(__('The memorando has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The memorando could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function download($id) {
        $this->viewClass = 'Media';
        $memo = $this->Memorando->findById($id);
         $params = array(
        	'id'        => $memo['Memorando']['arquivo'],
        	'name'      => $memo['Memorando']['titulo'],        	
        	'download'=>true,        	
        	'path'      => 'files'.DS.'Memorandos'.DS.$memo['Memorando']['id'].DS,
    	);    	
        $this->set($params);
    }
}
