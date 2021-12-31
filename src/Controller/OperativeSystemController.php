<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * OperativeSystem Controller
 *
 * @property \App\Model\Table\OperativeSystemTable $OperativeSystem
 * @method \App\Model\Entity\OperativeSystem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OperativeSystemController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $operativeSystem = $this->paginate($this->OperativeSystem);

        $this->set(compact('operativeSystem'));
    }

    /**
     * View method
     *
     * @param string|null $id Operative System id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $operativeSystem = $this->OperativeSystem->get($id, [
            'contain' => ['Machine'],
        ]);

        $this->set(compact('operativeSystem'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $operativeSystem = $this->OperativeSystem->newEmptyEntity();
        if ($this->request->is('post')) {
            $operativeSystem = $this->OperativeSystem->patchEntity($operativeSystem, $this->request->getData());
            if ($this->OperativeSystem->save($operativeSystem)) {
                $this->Flash->success(__('The operative system has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The operative system could not be saved. Please, try again.'));
        }
        $this->set(compact('operativeSystem'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Operative System id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $operativeSystem = $this->OperativeSystem->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $operativeSystem = $this->OperativeSystem->patchEntity($operativeSystem, $this->request->getData());
            if ($this->OperativeSystem->save($operativeSystem)) {
                $this->Flash->success(__('The operative system has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The operative system could not be saved. Please, try again.'));
        }
        $this->set(compact('operativeSystem'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Operative System id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $operativeSystem = $this->OperativeSystem->get($id);
        if ($this->OperativeSystem->delete($operativeSystem)) {
            $this->Flash->success(__('The operative system has been deleted.'));
        } else {
            $this->Flash->error(__('The operative system could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
