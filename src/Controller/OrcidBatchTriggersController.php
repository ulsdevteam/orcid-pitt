<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OrcidBatchTriggers Controller
 *
 * @property \App\Model\Table\OrcidBatchTriggersTable $OrcidBatchTriggers
 *
 * @method \App\Model\Entity\OrcidBatchTrigger[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrcidBatchTriggersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $orcidBatchTriggers = $this->paginate($this->OrcidBatchTriggers);

        $this->set(compact('orcidBatchTriggers'));
    }

    /**
     * View method
     *
     * @param string|null $id Orcid Batch Trigger id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $orcidBatchTrigger = $this->OrcidBatchTriggers->get($id, [
            'contain' => []
        ]);

        $this->set('orcidBatchTrigger', $orcidBatchTrigger);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $orcidBatchTrigger = $this->OrcidBatchTriggers->newEntity();
        if ($this->request->is('post')) {
            $orcidBatchTrigger = $this->OrcidBatchTriggers->patchEntity($orcidBatchTrigger, $this->request->getData());
            if ($this->OrcidBatchTriggers->save($orcidBatchTrigger)) {
                $this->Flash->success(__('The orcid batch trigger has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orcid batch trigger could not be saved. Please, try again.'));
        }
        $this->set(compact('orcidBatchTrigger'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Orcid Batch Trigger id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $orcidBatchTrigger = $this->OrcidBatchTriggers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $orcidBatchTrigger = $this->OrcidBatchTriggers->patchEntity($orcidBatchTrigger, $this->request->getData());
            if ($this->OrcidBatchTriggers->save($orcidBatchTrigger)) {
                $this->Flash->success(__('The orcid batch trigger has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orcid batch trigger could not be saved. Please, try again.'));
        }
        $this->set(compact('orcidBatchTrigger'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Orcid Batch Trigger id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $orcidBatchTrigger = $this->OrcidBatchTriggers->get($id);
        if ($this->OrcidBatchTriggers->delete($orcidBatchTrigger)) {
            $this->Flash->success(__('The orcid batch trigger has been deleted.'));
        } else {
            $this->Flash->error(__('The orcid batch trigger could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
