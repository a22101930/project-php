<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * GestaoSoft Controller
 *
 * @property \App\Model\Table\GestaoSoftTable $GestaoSoft
 * @method \App\Model\Entity\GestaoSoft[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GestaoSoftController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Machine', 'Software', 'SoftVersion']
        ];
        $gestaoSoft = $this->paginate($this->GestaoSoft);

        $this->set(compact('gestaoSoft'));
    }

    public function topten()
    {
        $this->paginate = [
            'contain' => ['Machine', 'Software', 'SoftVersion'],
            'limit' => 10
        ];
        $gestaoSoft = $this->paginate(
            $this->GestaoSoft->find()
                ->where(['Machine.status_id = ' => 1])
                ->group('Software.id')
                ->order(['Software.id' => 'DESC'])
                ->limit(10));

        $this->set(compact('gestaoSoft'));
    }


    /**
     * View method
     *
     * @param string|null $id Gestao Soft id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $gestaoSoft = $this->GestaoSoft->get($id, [
            'contain' => ['Machine', 'Software', 'SoftVersion'],
        ]);

        $this->set(compact('gestaoSoft'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $gestaoSoft = $this->GestaoSoft->newEmptyEntity();
        if ($this->request->is('post')) {
            $gestaoSoft = $this->GestaoSoft->patchEntity($gestaoSoft, $this->request->getData());
            if ($this->GestaoSoft->save($gestaoSoft)) {
                $this->Flash->success(__('The gestao soft has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gestao soft could not be saved. Please, try again.'));
        }
        $machine = $this->GestaoSoft->Machine->find('list', ['limit' => 200])->where(['status_id =' => 1])->all();

        $software = $this->GestaoSoft->Software->find('list', ['limit' => 200])->all();
        $softVersion = $this->GestaoSoft->SoftVersion->find('list', ['limit' => 200])->all();
        $this->set(compact('gestaoSoft', 'machine', 'software', 'softVersion'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Gestao Soft id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $gestaoSoft = $this->GestaoSoft->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $gestaoSoft = $this->GestaoSoft->patchEntity($gestaoSoft, $this->request->getData());
            if ($this->GestaoSoft->save($gestaoSoft)) {
                $this->Flash->success(__('The gestao soft has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gestao soft could not be saved. Please, try again.'));
        }
        $machine = $this->GestaoSoft->Machine->find('list', ['limit' => 200])->where(['status_id =' => 1])->all();
        $software = $this->GestaoSoft->Software->find('list', ['limit' => 200])->all();
        $softVersion = $this->GestaoSoft->SoftVersion->find('list', ['limit' => 200])->all();
        $this->set(compact('gestaoSoft', 'machine', 'software', 'softVersion'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Gestao Soft id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gestaoSoft = $this->GestaoSoft->get($id);
        if ($this->GestaoSoft->delete($gestaoSoft)) {
            $this->Flash->success(__('The gestao soft has been deleted.'));
        } else {
            $this->Flash->error(__('The gestao soft could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function populatesoftwareversion()
    {
        $this -> autoRender = false;

        $software_id = $this->request->getQuery("software_id");

        $softVersion = $this->GestaoSoft->SoftVersion->findAllBySoftwareId($software_id);
        $this->set('softVersion', $softVersion);
        $this->viewBuilder()->setOption('serialize', 'softVersion');
       
        $response = $this->response;
        // If you want a json response
        $response = $response->withType('application/json')
            ->withStringBody(json_encode($softVersion));
        return $response;
    }
}
