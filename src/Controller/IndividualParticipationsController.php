<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * IndividualParticipations Controller
 *
 * @property \App\Model\Table\IndividualParticipationsTable $IndividualParticipations
 */
class IndividualParticipationsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Athletes', 'Modes', 'Categories', 'Events']
        ];
        $this->set('individualParticipations', $this->paginate($this->IndividualParticipations));
        $this->set('_serialize', ['individualParticipations']);
    }

    /**
     * View method
     *
     * @param string|null $id Individual Participation id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $individualParticipation = $this->IndividualParticipations->get($id, [
            'contain' => ['Athletes', 'Modes', 'Categories', 'Events', 'Times']
        ]);
        $this->set('individualParticipation', $individualParticipation);
        $this->set('_serialize', ['individualParticipation']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $individualParticipation = $this->IndividualParticipations->newEntity();
        if ($this->request->is('post')) {
            $individualParticipation = $this->IndividualParticipations->patchEntity($individualParticipation, $this->request->data);
            if ($this->IndividualParticipations->save($individualParticipation)) {
                $this->Flash->success(__('The individual participation has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The individual participation could not be saved. Please, try again.'));
            }
        }
        $athletes = $this->IndividualParticipations->Athletes->find('list', ['limit' => 200]);
        $modes = $this->IndividualParticipations->Modes->find('list', ['limit' => 200]);
        $categories = $this->IndividualParticipations->Categories->find('list', ['limit' => 200]);
        $events = $this->IndividualParticipations->Events->find('list', ['limit' => 200]);
        $this->set(compact('individualParticipation', 'athletes', 'modes', 'categories', 'events'));
        $this->set('_serialize', ['individualParticipation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Individual Participation id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $individualParticipation = $this->IndividualParticipations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $individualParticipation = $this->IndividualParticipations->patchEntity($individualParticipation, $this->request->data);
            if ($this->IndividualParticipations->save($individualParticipation)) {
                $this->Flash->success(__('The individual participation has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The individual participation could not be saved. Please, try again.'));
            }
        }
        $athletes = $this->IndividualParticipations->Athletes->find('list', ['limit' => 200]);
        $modes = $this->IndividualParticipations->Modes->find('list', ['limit' => 200]);
        $categories = $this->IndividualParticipations->Categories->find('list', ['limit' => 200]);
        $events = $this->IndividualParticipations->Events->find('list', ['limit' => 200]);
        $this->set(compact('individualParticipation', 'athletes', 'modes', 'categories', 'events'));
        $this->set('_serialize', ['individualParticipation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Individual Participation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $individualParticipation = $this->IndividualParticipations->get($id);
        if ($this->IndividualParticipations->delete($individualParticipation)) {
            $this->Flash->success(__('The individual participation has been deleted.'));
        } else {
            $this->Flash->error(__('The individual participation could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
