<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Model Controller
 *
 * @property \App\Model\Table\ModelTable $Model
 * @method \App\Model\Entity\Model[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ModelController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Brand'],
        ];
        $model = $this->paginate($this->Model);

        $this->set(compact('model'));
    }

    /**
     * View method
     *
     * @param string|null $id Model id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $model = $this->Model->get($id, [
            'contain' => ['Brand', 'Machine'],
        ]);

        $this->set(compact('model'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $model = $this->Model->newEmptyEntity();
        if ($this->request->is('post')) {
            $model = $this->Model->patchEntity($model, $this->request->getData());
            if ($this->Model->save($model)) {
                $this->Flash->success(__('The model has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The model could not be saved. Please, try again.'));
        }
        $brand = $this->Model->Brand->find('list', ['limit' => 200])->all();
        $this->set(compact('model', 'brand'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Model id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $model = $this->Model->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $model = $this->Model->patchEntity($model, $this->request->getData());
            if ($this->Model->save($model)) {
                $this->Flash->success(__('The model has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The model could not be saved. Please, try again.'));
        }
        $brand = $this->Model->Brand->find('list', ['limit' => 200])->all();
        $this->set(compact('model', 'brand'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Model id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $model = $this->Model->get($id);
        if ($this->Model->delete($model)) {
            $this->Flash->success(__('The model has been deleted.'));
        } else {
            $this->Flash->error(__('The model could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
