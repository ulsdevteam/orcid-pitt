<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OrcidBatchCreators Controller
 *
 * @property \App\Model\Table\OrcidBatchCreatorsTable $OrcidBatchCreators
 *
 * @method \App\Model\Entity\OrcidBatchCreator[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrcidBatchCreatorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $orcidBatchCreators = $this->paginate($this->OrcidBatchCreators);

        $this->set(compact('orcidBatchCreators'));
    }

    /**
     * View method
     *
     * @param string|null $id Orcid Batch Creator id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $orcidBatchCreator = $this->OrcidBatchCreators->get($id, [
            'contain' => []
        ]);

        $this->set('orcidBatchCreator', $orcidBatchCreator);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $orcidBatchCreator = $this->OrcidBatchCreators->newEntity();
        if ($this->request->is('post')) {
            $orcidBatchCreator = $this->OrcidBatchCreators->patchEntity($orcidBatchCreator, $this->request->getData());
            if ($this->OrcidBatchCreators->save($orcidBatchCreator)) {
                $this->Flash->success(__('The orcid batch creator has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orcid batch creator could not be saved. Please, try again.'));
        }
        $this->set(compact('orcidBatchCreator'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Orcid Batch Creator id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $orcidBatchCreator = $this->OrcidBatchCreators->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $orcidBatchCreator = $this->OrcidBatchCreators->patchEntity($orcidBatchCreator, $this->request->getData());
            if ($this->OrcidBatchCreators->save($orcidBatchCreator)) {
                $this->Flash->success(__('The orcid batch creator has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orcid batch creator could not be saved. Please, try again.'));
        }
        $this->set(compact('orcidBatchCreator'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Orcid Batch Creator id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $orcidBatchCreator = $this->OrcidBatchCreators->get($id);
        if ($this->OrcidBatchCreators->delete($orcidBatchCreator)) {
            $this->Flash->success(__('The orcid batch creator has been deleted.'));
        } else {
            $this->Flash->error(__('The orcid batch creator could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
