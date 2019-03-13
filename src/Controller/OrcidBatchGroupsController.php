<?php
namespace app\Controller;

use App\Controller\AppController;
/**
 * OrcidBatchGroups Controller
 *
 * @property OrcidBatchGroup $OrcidBatchGroup
 * @property PaginatorComponent $Paginator
 */
class OrcidBatchGroupsController extends AppController {

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
		$this->OrcidBatchGroup->recursive = 0;
		$this->set('orcidBatchGroups', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OrcidBatchGroup->exists($id)) {
			throw new NotFoundException(__('Invalid Group'));
		}
		$options = array('conditions' => array('OrcidBatchGroup.' . $this->OrcidBatchGroup->primaryKey => $id));
		$this->set('orcidBatchGroup', $this->OrcidBatchGroup->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OrcidBatchGroup->create();
			if ($this->OrcidBatchGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The Group has been saved.'), 'default', array('class' => 'success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Group could not be saved. Please, try again.'));
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
		if (!$this->OrcidBatchGroup->exists($id)) {
			throw new NotFoundException(__('Invalid Group'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OrcidBatchGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The Group has been saved.'), 'default', array('class' => 'success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Group could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OrcidBatchGroup.' . $this->OrcidBatchGroup->primaryKey => $id));
			$this->request->data = $this->OrcidBatchGroup->find('first', $options);
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
		$this->OrcidBatchGroup->id = $id;
		if (!$this->OrcidBatchGroup->exists()) {
			throw new NotFoundException(__('Invalid Group'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->OrcidBatchGroup->delete()) {
			$this->Session->setFlash(__('The Group has been deleted.'), 'default', array('class' => 'success'));
		} else {
			$this->Session->setFlash(__('The Group could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * recache method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function recache($id = null) {
		$this->OrcidBatchGroup->id = $id;
		if (!$this->OrcidBatchGroup->exists()) {
			throw new NotFoundException(__('Invalid Group'));
		}
		$this->request->allowMethod('post');
		$options = array('conditions' => array('OrcidBatchGroup.' . $this->OrcidBatchGroup->primaryKey => $id));
		$group = $this->OrcidBatchGroup->find('first', $options);
		$group['OrcidBatchGroup']['cache_creation_date'] = NULL;
		if ($this->OrcidBatchGroup->save($group)) {
			$this->Session->setFlash(__('The Group cache has been expired.'), 'default', array('class' => 'success'));
		} else {
			$this->Session->setFlash(__('The Group cache could not be expired. Please, try again.'));
		}
		return $this->redirect(array('action' => 'view', $id));
	}

}
