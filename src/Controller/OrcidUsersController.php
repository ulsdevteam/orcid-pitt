<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OrcidUsers Controller
 *
 * @property \App\Model\Table\OrcidUsersTable $OrcidUsers
 *
 * @method \App\Model\Entity\OrcidUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrcidUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
//    public function initialize($controller, $settings) {
//        parent::initialize();
//        $this->Controller = & $controller;
//    }
    public function index()
    {
        $orcidUsers = $this->paginate($this->OrcidUsers);
//        $orcidUsers = $this->OrcidUsers;
        $this->set(compact('orcidUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Orcid User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $orcidUser = $this->OrcidUsers->get($id, [
            'contain' => []
        ]);

        $this->set('orcidUser', $orcidUser);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $orcidUser = $this->OrcidUsers->newEntity();
        if ($this->request->is('post')) {
            $orcidUser = $this->OrcidUsers->patchEntity($orcidUser, $this->request->getData());
            if ($this->OrcidUsers->save($orcidUser)) {
                $this->Flash->success(__('The orcid user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orcid user could not be saved. Please, try again.'));
        }
        $this->set(compact('orcidUser'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Orcid User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $orcidUser = $this->OrcidUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $orcidUser = $this->OrcidUsers->patchEntity($orcidUser, $this->request->getData());
            if ($this->OrcidUsers->save($orcidUser)) {
                $this->Flash->success(__('The orcid user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orcid user could not be saved. Please, try again.'));
        }
        $this->set(compact('orcidUser'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Orcid User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $orcidUser = $this->OrcidUsers->get($id);
        if ($this->OrcidUsers->delete($orcidUser)) {
            $this->Flash->success(__('The orcid user has been deleted.'));
        } else {
            $this->Flash->error(__('The orcid user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * optout method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function optout($id = null) {
//        if (!$this->OrcidUsers->exists($id)) {
//                throw new NotFoundException(__('Invalid ORCID User'));
//        }
        if ($this->request->is(array('post', 'put'))) {
                $this->loadModel('OrcidStatus');
                $this->loadModel('OrcidStatusType');
                $optOutStatusType = $this->OrcidStatusType->find('first', ['recursive' => -1, 'conditions' => ['OrcidStatusType.seq' => 5]]);
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
}