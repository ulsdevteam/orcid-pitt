<?php
namespace app\Controller;

use App\Controller\AppController;
use App\Lib\Emailer;

/**
 * OrcidEmails Controller
 *
 * @property OrcidEmail $OrcidEmail
 * @property PaginatorComponent $Paginator
 */
class OrcidEmailsController extends AppController {

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
		$this->OrcidEmail->recursive = 0;
		$this->set('orcidEmails', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OrcidEmail->exists($id)) {
			throw new NotFoundException(__('Invalid Email'));
		}
		$options = array('conditions' => array('OrcidEmail.' . $this->OrcidEmail->primaryKey => $id));
		$this->set('orcidEmail', $this->OrcidEmail->find('first', $options));
	}

/**
 * requeue method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function requeue($id = null) {
		if (!$this->OrcidEmail->exists($id)) {
			throw new NotFoundException(__('Invalid Email'));
		}
		$this->request->allowMethod(array('post', 'put'));
		// must be either sent or cancelled
		$options = array('recursive' => -1, 'conditions' => array('OrcidEmail.' . $this->OrcidEmail->primaryKey => $id, 'OR' => array(array('NOT' => array('OrcidEmail.sent' => NULL)), array('NOT' => array('OrcidEmail.cancelled' => NULL)))));
		$email = $this->OrcidEmail->find('first', $options);
		if ($email) {
			$email['OrcidEmail']['sent'] = '';
			$email['OrcidEmail']['cancelled'] = '';
			$email['OrcidEmail']['queued'] = date('Y-m-d H:i:s');
			if ($this->OrcidEmail->save($email)) {
				$this->Session->setFlash(__('The Email has been requeued.'), 'default', array('class' => 'success'));
			} else {
				$this->Session->setFlash(__('The Email could not be requeued. Please, try again.'));
			}
		} else {
			$this->Session->setFlash(__('The Email could not be requeued.'));
		}
		return $this->redirect(array('action' => 'view', $id));
	}

/**
 * cancel method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function cancel($id = null) {
		$this->OrcidEmail->id = $id;
		if (!$this->OrcidEmail->exists()) {
			throw new NotFoundException(__('Invalid Email'));
		}
		$this->request->allowMethod('post', 'delete');
		// must not be already sent or cancelled
		$options = array('recursive' => -1, 'conditions' => array('OrcidEmail.' . $this->OrcidEmail->primaryKey => $id, 'OrcidEmail.sent' => NULL, 'OrcidEmail.cancelled' => NULL));
		$email = $this->OrcidEmail->find('first', $options);
		if ($email) {
			$email['OrcidEmail']['cancelled'] = date('Y-m-d H:i:s');
			if ($this->OrcidEmail->save($email)) {
				$this->Session->setFlash(__('The Email has been cancelled.'), 'default', array('class' => 'success'));
			} else {
				$this->Session->setFlash(__('The Email could not be cancelled. Please, try again.'));
			}
		} else {
			$this->Session->setFlash(__('This Email cannot be cancelled.'));
		}
		return $this->redirect(array('action' => 'view', $id));
	}
	
/**
 * send method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function send($id = null) {
		$this->OrcidEmail->id = $id;
		if (!$this->OrcidEmail->exists()) {
			throw new NotFoundException(__('Invalid Email'));
		}
		$this->request->allowMethod('post');
		// must not be already sent or cancelled
		$options = array('recursive' => 1, 'conditions' => array('OrcidEmail.' . $this->OrcidEmail->primaryKey => $id, 'OrcidEmail.sent' => NULL, 'OrcidEmail.cancelled' => NULL));
		$email = $this->OrcidEmail->find('first', $options);
		$this->Emailer = new Emailer();
		if ($email) {
			$this->loadModel('Person');
			// TODO: warning: hardcoded foreign key relationship
			$options = array('conditions' => '(cn='.$email['OrcidUser']['username'].')');
			$person = $this->Person->find('first', $options);
			if ($this->Emailer->sendBatch($email, $person)) {
				$this->Session->setFlash(__('The Email has been sent.'), 'default', array('class' => 'success'));
			} else {
				$this->Session->setFlash(__('The Email could not be sent. Please, try again.'));
			}
		} else {
			$this->Session->setFlash(__('This Email cannot be sent.'));
		}
		return $this->redirect(array('action' => 'view', $id));
	}

/**
 * sendAll method
 *
 * @return void
 */
	public function sendAll() {
		$this->request->allowMethod('post');
		// must not be already sent or cancelled
		$options = array('recursive' => 1, 'conditions' => array('OrcidEmail.sent' => NULL, 'OrcidEmail.cancelled' => NULL));
		$emails = $this->OrcidEmail->find('all', $options);
		$success = 0;
		$failed = 0;
		$this->loadModel('Person');
		$this->Emailer = new Emailer();
		foreach ($emails as $email) {
			// TODO: warning: hardcoded foreign key relationship
			$options = array('conditions' => '(cn='.$email['OrcidUser']['username'].')');
			$person = $this->Person->find('first', $options);
			if ($this->Emailer->sendBatch($email, $person)) {
				$success++;
			} else {
				$failed++;
			}
		}
		if ($success) {
			$this->Session->setFlash(__('Successfully sent '.$success.' email'.($success > 1 ? 's' : '')), 'default', array('class' => 'success'));
		}
		if ($failed) {
			$this->Session->setFlash(__('Failed to send '.$failed.' email'.($failed > 1 ? 's' : '')));
		}
		if (!$success && !$failed) {
			$this->Session->setFlash(__('No emails to send.'));
		}
		return $this->redirect('/');
	}

}
