<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Brand Controller
 *
 * @property \App\Model\Table\BrandTable $Brand
 * @method \App\Model\Entity\Brand[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BrandController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $brand = $this->paginate($this->Brand);

        $this->set(compact('brand'));
    }

    /**
     * View method
     *
     * @param string|null $id Brand id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $brand = $this->Brand->get($id, [
            'contain' => ['Machine', 'Model'],
        ]);

        $this->set(compact('brand'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $brand = $this->Brand->newEmptyEntity();
        if ($this->request->is('post')) {
            $brand = $this->Brand->patchEntity($brand, $this->request->getData());
            if ($this->Brand->save($brand)) {
                $this->Flash->success(__('The brand has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The brand could not be saved. Please, try again.'));
        }
        $this->set(compact('brand'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Brand id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $brand = $this->Brand->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $brand = $this->Brand->patchEntity($brand, $this->request->getData());
            if ($this->Brand->save($brand)) {
                $this->Flash->success(__('The brand has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The brand could not be saved. Please, try again.'));
        }
        $this->set(compact('brand'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Brand id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $brand = $this->Brand->get($id);
        if ($this->Brand->delete($brand)) {
            $this->Flash->success(__('The brand has been deleted.'));
        } else {
            $this->Flash->error(__('The brand could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
