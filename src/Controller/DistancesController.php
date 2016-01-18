<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Distances Controller
 *
 * @property \App\Model\Table\DistancesTable $Distances
 */
class DistancesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('distances', $this->paginate($this->Distances));
        $this->set('_serialize', ['distances']);
    }

    /**
     * View method
     *
     * @param string|null $id Distance id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $distance = $this->Distances->get($id, [
            'contain' => ['Categories']
        ]);
        $this->set('distance', $distance);
        $this->set('_serialize', ['distance']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $distance = $this->Distances->newEntity();
        if ($this->request->is('post')) {
            $distance = $this->Distances->patchEntity($distance, $this->request->data);
            if ($this->Distances->save($distance)) {
                $this->Flash->success(__('The distance has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The distance could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('distance'));
        $this->set('_serialize', ['distance']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Distance id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $distance = $this->Distances->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $distance = $this->Distances->patchEntity($distance, $this->request->data);
            if ($this->Distances->save($distance)) {
                $this->Flash->success(__('The distance has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The distance could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('distance'));
        $this->set('_serialize', ['distance']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Distance id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $distance = $this->Distances->get($id);
        if ($this->Distances->delete($distance)) {
            $this->Flash->success(__('The distance has been deleted.'));
        } else {
            $this->Flash->error(__('The distance could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
