<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Times Controller
 *
 * @property \App\Model\Table\TimesTable $Times
 */
class TimesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        
        /*
        $athlete = $this->Athletes->get($id, [
            'contain' => ['Teams', 'IndividualParticipations']
        ]);

        $modes = $this->loadModel('Modes');
        $categories = $this->loadModel('Categories');
        $events = $this->loadModel('Events');
        $clubs = $this->loadModel('Clubs');
        $distances = $this->loadModel('Distances');
        $ages = $this->loadModel('Ages');

        $this->set('modes', $modes);
        $this->set('categories', $categories);
        $this->set('events', $events);
        $this->set('clubs', $clubs);
        $this->set('distances', $distances);
        $this->set('ages', $ages);
        $this->set('athlete', $athlete);
        $this->set('_serialize', ['athlete']);
        */

        $this->paginate = [
            'contain' => ['IndividualParticipations', 'TeamParticipations']
        ];
        /* LIB */
        $athletes = $this->loadModel('Athletes');
        $teams = $this->loadModel('Teams');
        
        /* LIB */
        
        $this->set('times', $this->paginate($this->Times));
        $this->set('_serialize', ['times']);
        
        /* LIB */
        $this->set('athletes', $athletes);
        $this->set('teams', $teams);
        /* LIB */
    }

    /**
     * View method
     *
     * @param string|null $id Time id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $time = $this->Times->get($id, [
            'contain' => ['IndividualParticipations', 'TeamParticipations']
        ]);
        $this->set('time', $time);
        $this->set('_serialize', ['time']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $time = $this->Times->newEntity();
        if ($this->request->is('post')) {
            $time = $this->Times->patchEntity($time, $this->request->data);
            if ($this->Times->save($time)) {
                $this->Flash->success(__('The time has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The time could not be saved. Please, try again.'));
            }
        }
        $individualParticipations = $this->Times->IndividualParticipations->find('list', ['limit' => 200]);
        $teamParticipations = $this->Times->TeamParticipations->find('list', ['limit' => 200]);
        $this->set(compact('time', 'individualParticipations', 'teamParticipations'));
        $this->set('_serialize', ['time']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Time id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $time = $this->Times->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $time = $this->Times->patchEntity($time, $this->request->data);
            if ($this->Times->save($time)) {
                $this->Flash->success(__('The time has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The time could not be saved. Please, try again.'));
            }
        }
        $individualParticipations = $this->Times->IndividualParticipations->find('list', ['limit' => 200]);
        $teamParticipations = $this->Times->TeamParticipations->find('list', ['limit' => 200]);
        $this->set(compact('time', 'individualParticipations', 'teamParticipations'));
        $this->set('_serialize', ['time']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Time id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $time = $this->Times->get($id);
        if ($this->Times->delete($time)) {
            $this->Flash->success(__('The time has been deleted.'));
        } else {
            $this->Flash->error(__('The time could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
