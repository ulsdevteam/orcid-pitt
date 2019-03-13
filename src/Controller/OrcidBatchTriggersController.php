<?php
namespace app\Controller;

use App\Controller\AppController;
use App\Lib\Emailer;
/**
 * OrcidBatchTriggers Controller
 *
 * @property OrcidBatchTrigger $OrcidBatchTrigger
 * @property PaginatorComponent $Paginator
 */
class OrcidBatchTriggersController extends AppController {

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
		$this->OrcidBatchTrigger->recursive = 0;
		$this->set('orcidBatchTriggers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OrcidBatchTrigger->exists($id)) {
			throw new NotFoundException(__('Invalid Trigger'));
		}
		$options = array('conditions' => array('OrcidBatchTrigger.' . $this->OrcidBatchTrigger->primaryKey => $id));
		$this->set('orcidBatchTrigger', $this->OrcidBatchTrigger->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OrcidBatchTrigger->create();
			if ($this->OrcidBatchTrigger->save($this->request->data)) {
				$this->Session->setFlash(__('The Trigger has been saved.'), 'default', array('class' => 'success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Trigger could not be saved. Please, try again.'));
			}
		} else {
			if ($this->request->query('orcid_batch_id')) {
				$this->data = array('OrcidBatchTrigger' => array('orcid_batch_id' => intval($this->request->query('orcid_batch_id'))));
			}
		}
		$orcidStatusTypes = $this->OrcidBatchTrigger->OrcidStatusType->find('list');
		$orcidBatches = $this->OrcidBatchTrigger->OrcidBatch->find('list');
		$reqBatches = array(0 => __('No Requirement'), -1 => __('Require any prior Email'));
		$orcidBatchGroups = $this->OrcidBatchTrigger->OrcidBatchGroup->find('list');
		$this->set(compact('orcidStatusTypes', 'orcidBatches', 'orcidBatchGroups', 'reqBatches'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->OrcidBatchTrigger->exists($id)) {
			throw new NotFoundException(__('Invalid Trigger'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OrcidBatchTrigger->save($this->request->data)) {
				$this->Session->setFlash(__('The Trigger has been saved.'), 'default', array('class' => 'success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Trigger could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OrcidBatchTrigger.' . $this->OrcidBatchTrigger->primaryKey => $id));
			$this->request->data = $this->OrcidBatchTrigger->find('first', $options);
		}
		$orcidStatusTypes = $this->OrcidBatchTrigger->OrcidStatusType->find('list');
		$orcidBatches = $this->OrcidBatchTrigger->OrcidBatch->find('list');
		$reqBatches = array(0 => __('No Requirement'), -1 => __('Require any prior Email'));
		$orcidBatchGroups = $this->OrcidBatchTrigger->OrcidBatchGroup->find('list');
		$this->set(compact('orcidStatusTypes', 'orcidBatches', 'orcidBatchGroups', 'reqBatches'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->OrcidBatchTrigger->id = $id;
		if (!$this->OrcidBatchTrigger->exists()) {
			throw new NotFoundException(__('Invalid Trigger'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->OrcidBatchTrigger->delete()) {
			$this->Session->setFlash(__('The Trigger has been deleted.'), 'default', array('class' => 'success'));
		} else {
			$this->Session->setFlash(__('The Trigger could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * execute method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function execute($id = null) {
		$this->OrcidBatchTrigger->id = $id;
		if (!$this->OrcidBatchTrigger->exists()) {
			throw new NotFoundException(__('Invalid Trigger'));
		}
		$this->request->allowMethod('post');
		$this->Emailer = new Emailer();
		$options = array('conditions' => array('OrcidBatchTrigger.' . $this->OrcidBatchTrigger->primaryKey => $id));
		$trigger = $this->OrcidBatchTrigger->find('first', $options);
		if ($trigger['OrcidBatchTrigger']['begin_date'] && strtotime($trigger['OrcidBatchTrigger']['begin_date']) > time()) {
			$this->Session->setFlash(__('The Trigger has a future Begin Date.'));
		} else if ($this->Emailer->executeTrigger($trigger)) {
			$this->Session->setFlash(__('The Trigger has run.'), 'default', array('class' => 'success'));
		} else {
			$this->Session->setFlash(__('The Trigger could not be run. Please, try again.'));
		}
		return $this->redirect(array('action' => 'view', $id));
	}

/**
 * executeAll method
 *
 * @return void
 */
	public function executeAll() {
		$this->request->allowMethod('post');
		$this->Emailer = new Emailer();
		// must not be already sent or cancelled
		$triggers = $this->OrcidBatchTrigger->find('all', array('conditions' => array('or' => array(array('begin_date <=' => 'today'), array('begin_date' => NULL))), 'order' => array('require_batch_id DESC')));
		$success = 0;
		$failed = 0;
		foreach ($triggers as $trigger) {
			if ($this->Emailer->executeTrigger($trigger)) {
				$success++;
			} else {
				$failed++;
			}
		}
		if ($success) {
			$this->Session->setFlash(__('Successfully ran '.$success.' trigger'.($success > 1 ? 's' : '')), 'default', array('class' => 'success'));
		}
		if ($failed) {
			$this->Session->setFlash(__('Failed '.$failed.' trigger run'.($failed > 1 ? 's' : '')));
		}
		if (!$success && !$failed) {
			$this->Session->setFlash(__('No triggers to run.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

}
