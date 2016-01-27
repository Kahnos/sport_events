<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Athletes Controller
 *
 * @property \App\Model\Table\AthletesTable $Athletes
 */
class AthletesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('athletes', $this->paginate($this->Athletes));
        $this->set('_serialize', ['athletes']);
    }

    /**
     * View method
     *
     * @param string|null $id Athlete id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $athlete = $this->Athletes->get($id, [
            'contain' => ['Teams', 'IndividualParticipations']
        ]);
        
        $clubs = $this->loadModel('Clubs');
        $modes = $this->loadModel('Modes');
        $categories = $this->loadModel('Categories');
        $distances = $this->loadModel('Distances');
        $events = $this->loadModel('Events');
        $ages = $this->loadModel('Ages');

        $this->set('modes', $modes);
        $this->set('categories', $categories);
        $this->set('distances', $distances);
        $this->set('ages', $ages);
        $this->set('events', $events);
        $this->set('clubs', $clubs);
        $this->set('athlete', $athlete);
        $this->set('_serialize', ['athlete']);
    }
    //$data = ClassRegistry::init('IngredientAlias')->find('first', array());
    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $athlete = $this->Athletes->newEntity();
        if ($this->request->is('post')) {
            $athlete = $this->Athletes->patchEntity($athlete, $this->request->data);
            if ($this->Athletes->save($athlete)) {
                $this->Flash->success(__('The athlete has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The athlete could not be saved. Please, try again.'));
            }
        }
        $teams = $this->Athletes->Teams->find('list', ['limit' => 200]);
        $this->set(compact('athlete', 'teams'));
        $this->set('_serialize', ['athlete']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Athlete id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $athlete = $this->Athletes->get($id, [
            'contain' => ['Teams']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $athlete = $this->Athletes->patchEntity($athlete, $this->request->data);
            if ($this->Athletes->save($athlete)) {
                $this->Flash->success(__('The athlete has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The athlete could not be saved. Please, try again.'));
            }
        }
        $teams = $this->Athletes->Teams->find('list', ['limit' => 200]);
        $this->set(compact('athlete', 'teams'));
        $this->set('_serialize', ['athlete']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Athlete id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $athlete = $this->Athletes->get($id);
        if ($this->Athletes->delete($athlete)) {
            $this->Flash->success(__('The athlete has been deleted.'));
        } else {
            $this->Flash->error(__('The athlete could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
