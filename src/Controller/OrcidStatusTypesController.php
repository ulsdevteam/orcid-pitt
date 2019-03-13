<?php
namespace app\Controller;

use App\Controller\AppController;
/**
 * OrcidStatusTypes Controller
 *
 * @property OrcidStatusType $OrcidStatusType
 * @property PaginatorComponent $Paginator
 */
class OrcidStatusTypesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->OrcidStatusType->recursive = 0;
		$this->set('orcidStatusTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OrcidStatusType->exists($id)) {
			throw new NotFoundException(__('Invalid Workflow Checkpoint'));
		}
		$options = array('conditions' => array('OrcidStatusType.' . $this->OrcidStatusType->primaryKey => $id));
		$options['recursive'] = 2;
		$this->set('orcidStatusType', $this->OrcidStatusType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OrcidStatusType->create();
			if ($this->OrcidStatusType->save($this->request->data)) {
				$this->Session->setFlash(__('The Workflow Checkpoint has been saved.'), 'default', array('class' => 'success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Workflow Checkpoint could not be saved. Please, try again.'));
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
		if (!$this->OrcidStatusType->exists($id)) {
			throw new NotFoundException(__('Invalid Workflow Checkpoint'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OrcidStatusType->save($this->request->data)) {
				$this->Session->setFlash(__('The Workflow Checkpoint has been saved.'), 'default', array('class' => 'success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Workflow Checkpoint could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OrcidStatusType.' . $this->OrcidStatusType->primaryKey => $id));
			$this->request->data = $this->OrcidStatusType->find('first', $options);
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
		$this->OrcidStatusType->id = $id;
		if (!$this->OrcidStatusType->exists()) {
			throw new NotFoundException(__('Invalid Workflow Checkpoint'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->OrcidStatusType->delete()) {
			$this->Session->setFlash(__('The Workflow Checkpoint has been deleted.'), 'default', array('class' => 'success'));
		} else {
			$this->Session->setFlash(__('The Workflow Checkpoint could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
