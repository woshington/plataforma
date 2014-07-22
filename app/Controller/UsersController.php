<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('initDB', 'edit');
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

	public function login() {
		$anos = array(date('Y')-1=>date('Y')-1, date('Y')=>date('Y'), date('Y')+1=>date('Y')+1);
		if ($this->request->is('post')) {
	        if ($this->Auth->login()) {	        	
	        	$_SESSION['ano'] = $this->request->data['User']['ano'];
	        	return $this->redirect($this->Auth->redirect());
        	}
        	$this->Session->setFlash(__('Your username or password was incorrect.'));
    	}
    	$this->set(compact('anos'));	
	}
	public function logout(){
		unset($_SESSION['ano']);
		$this->redirect($this->Auth->logout());		
	}

	public function initDB() {
		$group = $this->User->Group;

      	$group->id = 2;
      	$this->Acl->allow($group, 'controllers');

      	$group->id = 3;
      	$this->Acl->deny($group, 'controllers');
      	$this->Acl->allow($group, 'controllers/Memorandos');	  	
      
      	$this->Acl->allow($group, 'controllers/users/logout');

      	// we add an exit to avoid an ugly "missing views" error message
      	echo "all done";
      	exit;
  	}
}
