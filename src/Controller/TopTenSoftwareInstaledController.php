<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * TopTenSoftwareInstaled Controller
 *
 * @property \App\Model\Table\TopTenSoftwareInstaledTable $TopTenSoftwareInstaled
 * @method \App\Model\Entity\TopTenSoftwareInstaled[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TopTenSoftwareInstaledController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $topTenSoftwareInstaled = $this->paginate($this->TopTenSoftwareInstaled);

        $this->set(compact('topTenSoftwareInstaled'));
    }

    /**
     * View method
     *
     * @param string|null $id Top Ten Software Instaled id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $topTenSoftwareInstaled = $this->TopTenSoftwareInstaled->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('topTenSoftwareInstaled'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $topTenSoftwareInstaled = $this->TopTenSoftwareInstaled->newEmptyEntity();
        if ($this->request->is('post')) {
            $topTenSoftwareInstaled = $this->TopTenSoftwareInstaled->patchEntity($topTenSoftwareInstaled, $this->request->getData());
            if ($this->TopTenSoftwareInstaled->save($topTenSoftwareInstaled)) {
                $this->Flash->success(__('The top ten software instaled has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The top ten software instaled could not be saved. Please, try again.'));
        }
        $this->set(compact('topTenSoftwareInstaled'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Top Ten Software Instaled id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $topTenSoftwareInstaled = $this->TopTenSoftwareInstaled->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $topTenSoftwareInstaled = $this->TopTenSoftwareInstaled->patchEntity($topTenSoftwareInstaled, $this->request->getData());
            if ($this->TopTenSoftwareInstaled->save($topTenSoftwareInstaled)) {
                $this->Flash->success(__('The top ten software instaled has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The top ten software instaled could not be saved. Please, try again.'));
        }
        $this->set(compact('topTenSoftwareInstaled'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Top Ten Software Instaled id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $topTenSoftwareInstaled = $this->TopTenSoftwareInstaled->get($id);
        if ($this->TopTenSoftwareInstaled->delete($topTenSoftwareInstaled)) {
            $this->Flash->success(__('The top ten software instaled has been deleted.'));
        } else {
            $this->Flash->error(__('The top ten software instaled could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
