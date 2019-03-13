<?php
namespace app\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
/**
 * OrcidUsers Controller
 *
 * @property OrcidUser $OrcidUser
 * @property PaginatorComponent $Paginator
 */
class OrcidUsersController extends AppController {

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
                $this->OrcidUser->recursive = 0;
		$this->set('orcidUsers', $this->Paginator->paginate());
	}

/**
 * find method
 *
 * @param string $download file format
 * @return void
 */
	public function find() {
		$this->OrcidUser->recursive = 0;
		$this->OrcidBatchGroup = ClassRegistry::init('OrcidBatchGroup');
		$this->OrcidStatusType = ClassRegistry::init('OrcidStatusType');
		$findTypes = array(0 => __('Containing'), 1 => __('Starting With'), 2 => __('Ending With'), 3 => __('Matching Exactly'));
		$options = $this->_parameterize();
		$this->set('findTypes', $findTypes);
		$orcidBatchGroups = $this->OrcidBatchGroup->find('list');
		$orcidBatchGroups[-1] = __('No Group Membership');
		$this->set('orcidBatchGroups', $orcidBatchGroups);
		$this->set('orcidStatusTypes', $this->OrcidStatusType->find('list'));
		$this->set('orcidUsers', $this->Paginator->paginate($this->OrcidUser, $options));
	}



/**
 * report method
 *
 * @param string $download file format
 * @return void
 */
	public function report() {
		$debug = Configure::read('debug');
		Configure::write('debug', 0);
		$filename = tempnam(TMP, 'rep');
		$fh = fopen($filename, 'w');
		$this->OrcidUser->recursive = 0;
		$this->OrcidBatchGroup = ClassRegistry::init('OrcidBatchGroup');
		$this->OrcidStatusType = ClassRegistry::init('OrcidStatusType');
		$findTypes = array(0 => __('Containing'), 1 => __('Starting With'), 2 => __('Ending With'), 3 => __('Matching Exactly'));
		$orcidBatchGroups = $this->OrcidBatchGroup->find('list');
		$options = $this->_parameterize();
		$reportTitle = __('Users').($this->request->query('q') ? $findTypes[$this->request->query('s')].' '.'"'.$this->request->query('q').'"' : '').($this->request->query('g') ? ' '.__('within').' '.$orcidBatchGroups[$this->request->query('g')] : '');
		fputcsv($fh, array($reportTitle,null,null,null,null));
		fputcsv($fh, array('Username','ORCID iD','Name','RC','Department','Current Status','As Of'));
		$orcidUsers = $this->OrcidUser->find('all', array('conditions' => $options));
		$orcidStatusTypes = $this->OrcidStatusType->find('list');
		foreach ($orcidUsers as $orcidUser) {
			fputcsv($fh, array(
				$orcidUser['OrcidUser']['username'],
				$orcidUser['OrcidUser']['orcid'],
				$orcidUser['Person']['displayname'],
				$orcidUser['Person']['pittemployeerc'],
				$orcidUser['Person']['department'],
				$orcidStatusTypes[$orcidUser['CurrentOrcidStatus']['orcid_status_type_id']],
				$orcidUser['CurrentOrcidStatus']['status_timestamp'],
			));
		}
		fclose($fh);
		$this->response->file($filename, array('download' => true, 'name' => 'report.csv'));
		$this->response->header(array('Content-type: text/csv'));
		Configure::write('debug', $debug);
		return $this->response;
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OrcidUser->exists($id)) {
			throw new NotFoundException(__('Invalid ORCID User'));
		}
		$options = array('conditions' => array('OrcidUser.' . $this->OrcidUser->primaryKey => $id));
		$options['recursive'] = 2;
		$this->set('orcidUser', $this->OrcidUser->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OrcidUser->create();
			if ($this->OrcidUser->save($this->request->data)) {
				$this->Session->setFlash(__('The ORCID User has been saved.'), 'default', array('class' => 'success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ORCID User could not be saved. Please, try again.'));
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
		if (!$this->OrcidUser->exists($id)) {
			throw new NotFoundException(__('Invalid ORCID User'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OrcidUser->save($this->request->data)) {
				$this->Session->setFlash(__('The ORCID User has been saved.'), 'default', array('class' => 'success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ORCID User could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OrcidUser.' . $this->OrcidUser->primaryKey => $id));
			$this->request->data = $this->OrcidUser->find('first', $options);
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
		$this->OrcidUser->id = $id;
		if (!$this->OrcidUser->exists()) {
			throw new NotFoundException(__('Invalid ORCID User'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->OrcidUser->delete()) {
			$this->Session->setFlash(__('The ORCID User has been deleted.'), 'default', array('class' => 'success'));
		} else {
			$this->Session->setFlash(__('The ORCID User could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * optout method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function optout($id = null) {
		if (!$this->OrcidUser->exists($id)) {
			throw new NotFoundException(__('Invalid ORCID User'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->OrcidStatus = ClassRegistry::init('OrcidStatus');
			$this->OrcidStatusType = ClassRegistry::init('OrcidStatusType');
			$optOutStatusType = $this->OrcidStatusType->find('first', array('recursive' => -1, 'conditions' => array('OrcidStatusType.seq' => 5)));
			if ($this->OrcidStatus->find('first', array('conditions' => array('orcid_user_id' => $id, 'orcid_status_type_id' => $optOutStatusType['OrcidStatusType']['id'])))) {
				$this->Session->setFlash(__('The ORCID User has already opted out.'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->OrcidStatus->create();
			$optOutStatus = array(
				'orcid_user_id' => $id,
				'orcid_status_type_id' => $optOutStatusType['OrcidStatusType']['id'],
				'status_timestamp' => date('Y-m-d H:i:s'),
			);
			if ($this->OrcidStatus->save($optOutStatus)) {
				$this->Session->setFlash(__('The ORCID Opt-out has been saved.'), 'default', array('class' => 'success'));
			} else {
				$this->Session->setFlash(__('The ORCID Opt-out could not be saved. Please, try again.'));
			}
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * parameterize method
 *
 * @return array
 */
	private function _parameterize() {
		$options = array();
		// query by string matching
		if ($this->request->query('q')) {
			$options = array('OR' => array(
				'username'.($this->request->query('s') == 3 ? '' : ' LIKE') => strtoupper($this->request->query('q')) ? ($this->request->query('s') == 2 || $this->request->query('s') == 0 ? '%' : '').strtoupper($this->request->query('q')).($this->request->query('s') == 1 || $this->request->query('s') == 0 ? '%' : '') : '',
				'orcid'.($this->request->query('s') == 3 ? '' : ' LIKE') => $this->request->query('q') ? ($this->request->query('s') == 2 || $this->request->query('s') == 0 ? '%' : '').$this->request->query('q').($this->request->query('s') == 1 || $this->request->query('s') == 0 ? '%' : '') : ''
				)
			);
		}
		// query by group
		if (!$this->OrcidBathGroup) {
			$this->OrcidBatchGroup = ClassRegistry::init('OrcidBatchGroup');
		}
		if ($this->request->query('g')) {
			$members = $this->OrcidBatchGroup->getAssociatedUsers( intval($this->request->query('g')), 'OrcidUser.'.$this->OrcidUser->primaryKey );
			$options[] = $members;
		}
		// if no query specified, return nothing
		if (!$options) {
			$options = array('id' => -1);
		}
		return $options;
	}

}
?>
