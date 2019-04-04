<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OrcidEmails Controller
 *
 * @property \App\Model\Table\OrcidEmailsTable $OrcidEmails
 *
 * @method \App\Model\Entity\OrcidEmail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrcidEmailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $orcidEmails = $this->paginate($this->OrcidEmails);

        $this->set(compact('orcidEmails'));
    }

    /**
     * View method
     *
     * @param string|null $id Orcid Email id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $orcidEmail = $this->OrcidEmails->get($id, [
            'contain' => []
        ]);

        $this->set('orcidEmail', $orcidEmail);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $orcidEmail = $this->OrcidEmails->newEntity();
        if ($this->request->is('post')) {
            $orcidEmail = $this->OrcidEmails->patchEntity($orcidEmail, $this->request->getData());
            if ($this->OrcidEmails->save($orcidEmail)) {
                $this->Flash->success(__('The orcid email has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orcid email could not be saved. Please, try again.'));
        }
        $this->set(compact('orcidEmail'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Orcid Email id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $orcidEmail = $this->OrcidEmails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $orcidEmail = $this->OrcidEmails->patchEntity($orcidEmail, $this->request->getData());
            if ($this->OrcidEmails->save($orcidEmail)) {
                $this->Flash->success(__('The orcid email has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orcid email could not be saved. Please, try again.'));
        }
        $this->set(compact('orcidEmail'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Orcid Email id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $orcidEmail = $this->OrcidEmails->get($id);
        if ($this->OrcidEmails->delete($orcidEmail)) {
            $this->Flash->success(__('The orcid email has been deleted.'));
        } else {
            $this->Flash->error(__('The orcid email could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
