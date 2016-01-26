<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AthletesTeams Controller
 *
 * @property \App\Model\Table\AthletesTeamsTable $AthletesTeams
 */
class AthletesTeamsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Athletes', 'Teams']
        ];
        $this->set('athletesTeams', $this->paginate($this->AthletesTeams));
        $this->set('_serialize', ['athletesTeams']);
    }

    /**
     * View method
     *
     * @param string|null $id Athletes Team id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $athletesTeam = $this->AthletesTeams->get($id, [
            'contain' => ['Athletes', 'Teams']
        ]);
        $this->set('athletesTeam', $athletesTeam);
        $this->set('_serialize', ['athletesTeam']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $athletesTeam = $this->AthletesTeams->newEntity();
        if ($this->request->is('post')) {
            $athletesTeam = $this->AthletesTeams->patchEntity($athletesTeam, $this->request->data);
            if ($this->AthletesTeams->save($athletesTeam)) {
                $this->Flash->success(__('The athletes team has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The athletes team could not be saved. Please, try again.'));
            }
        }
        $athletes = $this->AthletesTeams->Athletes->find('list', ['limit' => 200]);
        $teams = $this->AthletesTeams->Teams->find('list', ['limit' => 200]);
        $this->set(compact('athletesTeam', 'athletes', 'teams'));
        $this->set('_serialize', ['athletesTeam']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Athletes Team id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $athletesTeam = $this->AthletesTeams->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $athletesTeam = $this->AthletesTeams->patchEntity($athletesTeam, $this->request->data);
            if ($this->AthletesTeams->save($athletesTeam)) {
                $this->Flash->success(__('The athletes team has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The athletes team could not be saved. Please, try again.'));
            }
        }
        $athletes = $this->AthletesTeams->Athletes->find('list', ['limit' => 200]);
        $teams = $this->AthletesTeams->Teams->find('list', ['limit' => 200]);
        $this->set(compact('athletesTeam', 'athletes', 'teams'));
        $this->set('_serialize', ['athletesTeam']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Athletes Team id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $athletesTeam = $this->AthletesTeams->get($id);
        if ($this->AthletesTeams->delete($athletesTeam)) {
            $this->Flash->success(__('The athletes team has been deleted.'));
        } else {
            $this->Flash->error(__('The athletes team could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
