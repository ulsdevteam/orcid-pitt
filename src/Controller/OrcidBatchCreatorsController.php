<?php
namespace app\Controller;

use App\Controller\AppController;
/**
 * OrcidBatchCreators Controller
 *
 * @property OrcidBatchCreator $OrcidBatchCreator
 * @property PaginatorComponent $Paginator
 */
class OrcidBatchCreatorsController extends AppController {

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
		$this->OrcidBatchCreator->recursive = 0;
		$this->set('orcidBatchCreators', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OrcidBatchCreator->exists($id)) {
			throw new NotFoundException(__('Invalid Administrator'));
		}
		$options = array('conditions' => array('OrcidBatchCreator.' . $this->OrcidBatchCreator->primaryKey => $id));
		$this->set('orcidBatchCreator', $this->OrcidBatchCreator->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OrcidBatchCreator->create();
			if ($this->OrcidBatchCreator->save($this->request->data)) {
				$this->Session->setFlash(__('The Administrator has been saved.'), 'default', array('class' => 'success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Administrator could not be saved. Please, try again.'));
			}
		}
	}

/**
 * enable method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function enable($id = null) {
		if (!$this->OrcidBatchCreator->exists($id)) {
			throw new NotFoundException(__('Invalid Administrator'));
		}
		$this->request->allowMethod('post', 'put');
		$options = array('recursive' => -1, 'conditions' => array('OrcidBatchCreator.' . $this->OrcidBatchCreator->primaryKey => $id));
		$creator = $this->OrcidBatchCreator->find('first', $options);
		$creator['OrcidBatchCreator']['flags'] = $creator['OrcidBatchCreator']['flags'] & ~ 1;
		if ($this->OrcidBatchCreator->save($creator)) {
			$this->Session->setFlash(__('The Administrator has been enabled.'), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('The Administrator could not be enabled. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * disable method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function disable($id = null) {
		$this->OrcidBatchCreator->id = $id;
		if (!$this->OrcidBatchCreator->exists()) {
			throw new NotFoundException(__('Invalid Administrator'));
		}
		$this->request->allowMethod('post', 'put', 'delete');
		$options = array('recursive' => -1, 'conditions' => array('OrcidBatchCreator.' . $this->OrcidBatchCreator->primaryKey => $id));
		$creator = $this->OrcidBatchCreator->find('first', $options);
		$creator['OrcidBatchCreator']['flags'] = $creator['OrcidBatchCreator']['flags'] | 1;
		if ($this->OrcidBatchCreator->save($creator)) {
			$this->Session->setFlash(__('The Administrator has been disabled.'), 'default', array('class' => 'success'));
		} else {
			$this->Session->setFlash(__('The Administrator could not be disabled. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * getUser method
 *
 * @param request $request
 * @return mixed User or FALSE
 */
	public function getUser($request) {
		$user = env('REMOTE_USER');
		$options = array('conditions' => array('OrcidBatchCreator.username' => $user));
		$creator = $this->OrcidBatchCreator->find('first', $options);
		return $creator['OrcidBatchCreator']['flags'] &  1 ? FALSE : $creator;
	}
}
