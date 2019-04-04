<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OrcidBatches Controller
 *
 * @property \App\Model\Table\OrcidBatchesTable $OrcidBatches
 *
 * @method \App\Model\Entity\OrcidBatch[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrcidBatchesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $orcidBatches = $this->paginate($this->OrcidBatches);

        $this->set(compact('orcidBatches'));
    }

    /**
     * View method
     *
     * @param string|null $id Orcid Batch id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $orcidBatch = $this->OrcidBatches->get($id, [
            'contain' => []
        ]);

        $this->set('orcidBatch', $orcidBatch);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $orcidBatch = $this->OrcidBatches->newEntity();
        if ($this->request->is('post')) {
            $orcidBatch = $this->OrcidBatches->patchEntity($orcidBatch, $this->request->getData());
            if ($this->OrcidBatches->save($orcidBatch)) {
                $this->Flash->success(__('The orcid batch has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orcid batch could not be saved. Please, try again.'));
        }
        $this->set(compact('orcidBatch'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Orcid Batch id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $orcidBatch = $this->OrcidBatches->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $orcidBatch = $this->OrcidBatches->patchEntity($orcidBatch, $this->request->getData());
            if ($this->OrcidBatches->save($orcidBatch)) {
                $this->Flash->success(__('The orcid batch has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orcid batch could not be saved. Please, try again.'));
        }
        $this->set(compact('orcidBatch'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Orcid Batch id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $orcidBatch = $this->OrcidBatches->get($id);
        if ($this->OrcidBatches->delete($orcidBatch)) {
            $this->Flash->success(__('The orcid batch has been deleted.'));
        } else {
            $this->Flash->error(__('The orcid batch could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
