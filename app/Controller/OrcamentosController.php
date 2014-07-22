	<?php
App::uses('AppController', 'Controller');
/**
 * Orcamentos Controller
 *
 * @property Orcamento $Orcamento
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class OrcamentosController extends AppController {
	public $uses = array('Orcamento', 'Despesa');	
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
		$this->paginate = array(
			'conditions'=>array(
				'Orcamento.ano'=>$_SESSION['ano']
			),
			'recursive'=>0
		);
		

		$despesas = $this->Despesa->getDespesasPorOrcamento();
		$this->set('orcamentos', $this->Paginator->paginate());
		$this->set('despesas', $despesas);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Orcamento->exists($id)) {
			throw new NotFoundException(__('Invalid orcamento'));
		}
		$options = array('conditions' => array('Orcamento.' . $this->Orcamento->primaryKey => $id));
		$this->set('orcamento', $this->Orcamento->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->request->data['Orcamento']['ano'] = $_SESSION['ano'];
			$this->Orcamento->create();
			if ($this->Orcamento->save($this->request->data)) {
				$this->Session->setFlash(__('The orcamento has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The orcamento could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$categorias = $this->Orcamento->Categoria->find('list');
		$this->set(compact('categorias'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Orcamento->exists($id)) {
			throw new NotFoundException(__('Invalid orcamento'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Orcamento->save($this->request->data)) {
				$this->Session->setFlash(__('The orcamento has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The orcamento could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Orcamento.' . $this->Orcamento->primaryKey => $id));
			$this->request->data = $this->Orcamento->find('first', $options);
		}
		$categorias = $this->Orcamento->categorias->find('list');
		$this->set(compact('categorias'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Orcamento->id = $id;
		if (!$this->Orcamento->exists()) {
			throw new NotFoundException(__('Invalid orcamento'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Orcamento->delete()) {
			$this->Session->setFlash(__('The orcamento has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The orcamento could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
