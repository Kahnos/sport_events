<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Modes Controller
 *
 * @property \App\Model\Table\ModesTable $Modes
 */
class ModesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('modes', $this->paginate($this->Modes));
        $this->set('_serialize', ['modes']);
    }

    /**
     * View method
     *
     * @param string|null $id Mode id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mode = $this->Modes->get($id, [
            'contain' => ['Disciplines', 'IndividualParticipations', 'TeamParticipations', 'Winners']
        ]);
        $this->set('mode', $mode);
        $this->set('_serialize', ['mode']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mode = $this->Modes->newEntity();
        if ($this->request->is('post')) {
            $mode = $this->Modes->patchEntity($mode, $this->request->data);
            if ($this->Modes->save($mode)) {
                $this->Flash->success(__('The mode has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The mode could not be saved. Please, try again.'));
            }
        }
        $disciplines = $this->Modes->Disciplines->find('list', ['limit' => 200]);
        $this->set(compact('mode', 'disciplines'));
        $this->set('_serialize', ['mode']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Mode id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mode = $this->Modes->get($id, [
            'contain' => ['Disciplines']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mode = $this->Modes->patchEntity($mode, $this->request->data);
            if ($this->Modes->save($mode)) {
                $this->Flash->success(__('The mode has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The mode could not be saved. Please, try again.'));
            }
        }
        $disciplines = $this->Modes->Disciplines->find('list', ['limit' => 200]);
        $this->set(compact('mode', 'disciplines'));
        $this->set('_serialize', ['mode']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Mode id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mode = $this->Modes->get($id);
        if ($this->Modes->delete($mode)) {
            $this->Flash->success(__('The mode has been deleted.'));
        } else {
            $this->Flash->error(__('The mode could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
