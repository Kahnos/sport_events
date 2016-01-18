<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Disciplines Controller
 *
 * @property \App\Model\Table\DisciplinesTable $Disciplines
 */
class DisciplinesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('disciplines', $this->paginate($this->Disciplines));
        $this->set('_serialize', ['disciplines']);
    }

    /**
     * View method
     *
     * @param string|null $id Discipline id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $discipline = $this->Disciplines->get($id, [
            'contain' => ['Modes']
        ]);
        $this->set('discipline', $discipline);
        $this->set('_serialize', ['discipline']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $discipline = $this->Disciplines->newEntity();
        if ($this->request->is('post')) {
            $discipline = $this->Disciplines->patchEntity($discipline, $this->request->data);
            if ($this->Disciplines->save($discipline)) {
                $this->Flash->success(__('The discipline has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The discipline could not be saved. Please, try again.'));
            }
        }
        $modes = $this->Disciplines->Modes->find('list', ['limit' => 200]);
        $this->set(compact('discipline', 'modes'));
        $this->set('_serialize', ['discipline']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Discipline id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $discipline = $this->Disciplines->get($id, [
            'contain' => ['Modes']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $discipline = $this->Disciplines->patchEntity($discipline, $this->request->data);
            if ($this->Disciplines->save($discipline)) {
                $this->Flash->success(__('The discipline has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The discipline could not be saved. Please, try again.'));
            }
        }
        $modes = $this->Disciplines->Modes->find('list', ['limit' => 200]);
        $this->set(compact('discipline', 'modes'));
        $this->set('_serialize', ['discipline']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Discipline id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $discipline = $this->Disciplines->get($id);
        if ($this->Disciplines->delete($discipline)) {
            $this->Flash->success(__('The discipline has been deleted.'));
        } else {
            $this->Flash->error(__('The discipline could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
