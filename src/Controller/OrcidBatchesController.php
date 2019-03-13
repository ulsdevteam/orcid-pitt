<?php
namespace app\Controller;

use App\Controller\AppController;
use App\Lib\Emailer;

/**
 * OrcidBatches Controller
 *
 * @property OrcidBatch $OrcidBatch
 * @property PaginatorComponent $Paginator
 */
class OrcidBatchesController extends AppController {

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
		$this->OrcidBatch->recursive = 0;
		$this->set('orcidBatches', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OrcidBatch->exists($id)) {
			throw new NotFoundException(__('Invalid Batch Email'));
		}
		$options = array('conditions' => array('OrcidBatch.' . $this->OrcidBatch->primaryKey => $id));
		$options['recursive'] = 2;
		$this->set('orcidBatch', $this->OrcidBatch->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OrcidBatch->create();
			$orcidBatch = $this->request->data;
			$orcidBatch['OrcidBatch']['orcid_batch_creator_id'] = $this->Auth->user('id');
			if ($this->OrcidBatch->save($orcidBatch)) {
				$this->Session->setFlash(__('The Batch Email has been saved.'), 'default', array('class' => 'success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Batch Email could not be saved. Please, try again.'));
			}
		}
		$orcidBatchCreators = $this->OrcidBatch->OrcidBatchCreator->find('list');
		$this->set(compact('orcidBatchCreators'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->OrcidBatch->exists($id)) {
			throw new NotFoundException(__('Invalid Batch Email'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OrcidBatch->save($this->request->data)) {
				$this->Session->setFlash(__('The Batch Email has been saved.'), 'default', array('class' => 'success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Batch Email could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OrcidBatch.' . $this->OrcidBatch->primaryKey => $id));
			$this->request->data = $this->OrcidBatch->find('first', $options);
		}
		$orcidBatchCreators = $this->OrcidBatch->OrcidBatchCreator->find('list');
		$this->set(compact('orcidBatchCreators'));
	}

/**
 * preview method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function preview($id = null) {
		if (!$this->OrcidBatch->exists($id)) {
			throw new NotFoundException(__('Invalid Batch Email'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->request->data('recipient')) {
				$options = array('conditions' => array('OrcidBatch.' . $this->OrcidBatch->primaryKey => $id));
				$email = $this->OrcidBatch->find('first', $options);
				$person = array('Person' => array('mail' => $this->request->data('recipient'), 'displayname' => false));
				$this->Emailer = new Emailer();
				if ($this->Emailer->sendBatch($email, $person)) {
					$this->Session->setFlash(__('A preview of the Batch Email Template has been sent.'), 'default', array('class' => 'success'));
				} else {
					$this->Session->setFlash(__('The Batch Email Template could not be previewed. Please, try again.'));
				}
			} else {
				$this->Session->setFlash(__('The Batch Email Template cannot be previewed without a preview recipient. Please, try again.'));
			}
			return $this->redirect(array('action' => 'view', $id));
		} else {
			$this->layout = '/Emails/html/default';
			$this->view = '/Emails/html/batch';
			$options = array('conditions' => array('OrcidBatch.' . $this->OrcidBatch->primaryKey => $id));
			$email = $this->OrcidBatch->find('first', $options);
			$this->set('body', $email['OrcidBatch']['body']);
			$this->set('title', $email['OrcidBatch']['subject']);
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
		$this->OrcidBatch->id = $id;
		if (!$this->OrcidBatch->exists()) {
			throw new NotFoundException(__('Invalid Batch Email'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->OrcidBatch->delete()) {
			$this->Session->setFlash(__('The Batch Email has been deleted.'), 'default', array('class' => 'success'));
		} else {
			$this->Session->setFlash(__('The Batch Email could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
}
