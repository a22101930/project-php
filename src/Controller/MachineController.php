<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Machine Controller
 *
 * @property \App\Model\Table\MachineTable $Machine
 * @method \App\Model\Entity\Machine[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MachineController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Status', 'Brand', 'Model', 'OperativeSystem'],
        ];
        $machine = $this->paginate($this->Machine);

        $this->set(compact('machine'));
    }

    public function machines()
    {
        $this->paginate = [
            'contain' => ['Status', 'Brand', 'Model', 'OperativeSystem'],
        ];
        $machine = $this->paginate($this->Machine->find()->where(['status_id = ' => 1]));

        $this->set(compact('machine'));
    }

    public function populatemodel()
    {
        $this -> autoRender = false;

        $brand_id = $this->request->getQuery("brand_id");
        //$brand_id = 1;
        /*$model = $this->Machine->Model->find('list', ['limit' => 200])
            ->where(['brand_id = ' => $brand_id])->all();*/

        // findAllBy<fieldName>(string $value, array $fields, array $order, int $limit, int $page, int $recursive)
        $model = $this->Machine->Model->findAllByBrandId($brand_id);
        $this->set('model', $model);
        $this->viewBuilder()->setOption('serialize', 'model');
       
        $response = $this->response;
        // If you want a json response
        $response = $response->withType('application/json')
            ->withStringBody(json_encode($model));
        return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Machine id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $machine = $this->Machine->get($id, [
            'contain' => ['Status', 'Brand', 'Model', 'OperativeSystem', 'GestaoSoft'],
        ]);

        $this->set(compact('machine'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $machine = $this->Machine->newEmptyEntity();
        if ($this->request->is('post')) {
            $machine = $this->Machine->patchEntity($machine, $this->request->getData());
            if ($this->Machine->save($machine)) {
                $this->Flash->success(__('The machine has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The machine could not be saved. Please, try again.'));
        }
        $status = $this->Machine->Status->find('list', ['limit' => 200])->all();
        $brand = $this->Machine->Brand->find('list', ['limit' => 200])->all();
        $model = $this->Machine->Model->find('list', ['limit' => 200])->all();
        $operativeSystem = $this->Machine->OperativeSystem->find('list', ['limit' => 200])->all();
        $this->set(compact('machine', 'status', 'brand', 'model', 'operativeSystem'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Machine id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $machine = $this->Machine->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $machine = $this->Machine->patchEntity($machine, $this->request->getData());
            if ($this->Machine->save($machine)) {
                $this->Flash->success(__('The machine has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The machine could not be saved. Please, try again.'));
        }
        $status = $this->Machine->Status->find('list', ['limit' => 200])->all();
        $brand = $this->Machine->Brand->find('list', ['limit' => 200])->all();
        $model = $this->Machine->Model->find('list', ['limit' => 200])->all();
        $operativeSystem = $this->Machine->OperativeSystem->find('list', ['limit' => 200])->all();
        $this->set(compact('machine', 'status', 'brand', 'model', 'operativeSystem'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Machine id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $machine = $this->Machine->get($id);
        if ($this->Machine->delete($machine)) {
            $this->Flash->success(__('The machine has been deleted.'));
        } else {
            $this->Flash->error(__('The machine could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
