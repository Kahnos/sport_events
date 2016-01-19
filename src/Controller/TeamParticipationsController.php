<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TeamParticipations Controller
 *
 * @property \App\Model\Table\TeamParticipationsTable $TeamParticipations
 */
class TeamParticipationsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Teams', 'Modes', 'Categories', 'Events']
        ];
        $this->set('teamParticipations', $this->paginate($this->TeamParticipations));
        $this->set('_serialize', ['teamParticipations']);
    }

    /**
     * View method
     *
     * @param string|null $id Team Participation id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $teamParticipation = $this->TeamParticipations->get($id, [
            'contain' => ['Teams', 'Modes', 'Categories', 'Events', 'Times']
        ]);
        $this->set('teamParticipation', $teamParticipation);
        $this->set('_serialize', ['teamParticipation']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $teamParticipation = $this->TeamParticipations->newEntity();
        if ($this->request->is('post')) {
            $teamParticipation = $this->TeamParticipations->patchEntity($teamParticipation, $this->request->data);
            if ($this->TeamParticipations->save($teamParticipation)) {
                $this->Flash->success(__('The team participation has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The team participation could not be saved. Please, try again.'));
            }
        }
        $teams = $this->TeamParticipations->Teams->find('list', ['limit' => 200]);
        $modes = $this->TeamParticipations->Modes->find('list', ['limit' => 200]);
        $categories = $this->TeamParticipations->Categories->find('list', ['limit' => 200]);
        $events = $this->TeamParticipations->Events->find('list', ['limit' => 200]);
        $this->set(compact('teamParticipation', 'teams', 'modes', 'categories', 'events'));
        $this->set('_serialize', ['teamParticipation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Team Participation id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $teamParticipation = $this->TeamParticipations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $teamParticipation = $this->TeamParticipations->patchEntity($teamParticipation, $this->request->data);
            if ($this->TeamParticipations->save($teamParticipation)) {
                $this->Flash->success(__('The team participation has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The team participation could not be saved. Please, try again.'));
            }
        }
        $teams = $this->TeamParticipations->Teams->find('list', ['limit' => 200]);
        $modes = $this->TeamParticipations->Modes->find('list', ['limit' => 200]);
        $categories = $this->TeamParticipations->Categories->find('list', ['limit' => 200]);
        $events = $this->TeamParticipations->Events->find('list', ['limit' => 200]);
        $this->set(compact('teamParticipation', 'teams', 'modes', 'categories', 'events'));
        $this->set('_serialize', ['teamParticipation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Team Participation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $teamParticipation = $this->TeamParticipations->get($id);
        if ($this->TeamParticipations->delete($teamParticipation)) {
            $this->Flash->success(__('The team participation has been deleted.'));
        } else {
            $this->Flash->error(__('The team participation could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
