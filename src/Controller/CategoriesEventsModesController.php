<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CategoriesEventsModes Controller
 *
 * @property \App\Model\Table\CategoriesEventsModesTable $CategoriesEventsModes
 */
class CategoriesEventsModesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Modes', 'Categories', 'Events']
        ];
    
        $this->set('categoriesEventsModes', $this->paginate($this->CategoriesEventsModes));
        $this->set('_serialize', ['categoriesEventsModes']);
    }

    /**
     * View method
     *
     * @param string|null $id Categories Events Mode id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $categoriesEventsMode = $this->CategoriesEventsModes->get($id, [
            'contain' => ['Modes', 'Categories', 'Events']
        ]);
        
        $this->set('categoriesEventsMode', $categoriesEventsMode);
        $this->set('_serialize', ['categoriesEventsMode']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $categoriesEventsMode = $this->CategoriesEventsModes->newEntity();
        if ($this->request->is('post')) {
            $categoriesEventsMode = $this->CategoriesEventsModes->patchEntity($categoriesEventsMode, $this->request->data);
            if ($this->CategoriesEventsModes->save($categoriesEventsMode)) {
                $this->Flash->success(__('The categories events mode has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The categories events mode could not be saved. Please, try again.'));
            }
        }
        
        $categoriesTable = $this->loadModel('Categories');
        $categories = $categoriesTable -> find();
        $distances = $this->loadModel('Distances');
        $ages = $this->loadModel('Ages');
        $this->set('categories', $categories);
        $this->set('distances', $distances);
        $this->set('ages', $ages);
        
        $modes = $this->CategoriesEventsModes->Modes->find('list', ['limit' => 200]);
        //$categories = $this->CategoriesEventsModes->Categories->find('list', ['limit' => 200]);
        $events = $this->CategoriesEventsModes->Events->find('list', ['limit' => 200]);
        $this->set(compact('categoriesEventsMode', 'modes', 'categories', 'events'));
        $this->set('_serialize', ['categoriesEventsMode']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Categories Events Mode id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $categoriesEventsMode = $this->CategoriesEventsModes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $categoriesEventsMode = $this->CategoriesEventsModes->patchEntity($categoriesEventsMode, $this->request->data);
            if ($this->CategoriesEventsModes->save($categoriesEventsMode)) {
                $this->Flash->success(__('The categories events mode has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The categories events mode could not be saved. Please, try again.'));
            }
        }
        $modes = $this->CategoriesEventsModes->Modes->find('list', ['limit' => 200]);
        $categories = $this->CategoriesEventsModes->Categories->find('list', ['limit' => 200]);
        $events = $this->CategoriesEventsModes->Events->find('list', ['limit' => 200]);
        $this->set(compact('categoriesEventsMode', 'modes', 'categories', 'events'));
        $this->set('_serialize', ['categoriesEventsMode']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Categories Events Mode id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $categoriesEventsMode = $this->CategoriesEventsModes->get($id);
        if ($this->CategoriesEventsModes->delete($categoriesEventsMode)) {
            $this->Flash->success(__('The categories events mode has been deleted.'));
        } else {
            $this->Flash->error(__('The categories events mode could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
