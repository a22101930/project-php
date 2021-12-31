<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * SoftVersion Controller
 *
 * @property \App\Model\Table\SoftVersionTable $SoftVersion
 * @method \App\Model\Entity\SoftVersion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SoftVersionController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Software'],
        ];
        $softVersion = $this->paginate($this->SoftVersion);

        $this->set(compact('softVersion'));
    }

    /**
     * View method
     *
     * @param string|null $id Soft Version id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $softVersion = $this->SoftVersion->get($id, [
            'contain' => ['Software', 'GestaoSoft'],
        ]);

        $this->set(compact('softVersion'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $softVersion = $this->SoftVersion->newEmptyEntity();
        if ($this->request->is('post')) {
            $softVersion = $this->SoftVersion->patchEntity($softVersion, $this->request->getData());
            if ($this->SoftVersion->save($softVersion)) {
                $this->Flash->success(__('The soft version has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The soft version could not be saved. Please, try again.'));
        }
        $software = $this->SoftVersion->Software->find('list', ['limit' => 200])->all();
        $this->set(compact('softVersion', 'software'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Soft Version id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $softVersion = $this->SoftVersion->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $softVersion = $this->SoftVersion->patchEntity($softVersion, $this->request->getData());
            if ($this->SoftVersion->save($softVersion)) {
                $this->Flash->success(__('The soft version has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The soft version could not be saved. Please, try again.'));
        }
        $software = $this->SoftVersion->Software->find('list', ['limit' => 200])->all();
        $this->set(compact('softVersion', 'software'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Soft Version id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $softVersion = $this->SoftVersion->get($id);
        if ($this->SoftVersion->delete($softVersion)) {
            $this->Flash->success(__('The soft version has been deleted.'));
        } else {
            $this->Flash->error(__('The soft version could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
