<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Searches Controller
 *
 * @property \App\Model\Table\SearchesTable $Searches
 *
 * @method \App\Model\Entity\Search[] paginate($object = null, array $settings = [])
 */
class SearchesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $searches = $this->paginate($this->Searches, [
            'limit' => 5,
            'order' => [
                'created' => 'desc',
            ],
        ]);

        $this->set(compact('searches'));
        $this->set('_serialize', ['searches']);
    }

    /**
     * View method
     *
     * @param string|null $id Search id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $search = $this->Searches->get($id, [
            'contain' => []
        ]);

        $this->set('search', $search);
        $this->set('_serialize', ['search']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $userData = $this->request->getData();
            if (!isset($userData['search-term'])) {
                $this->Flash->error(__('Please specify a valid search term.'));
            }
            
            $searchTerm = $userData['search-term'];
            $results = file_get_contents('http://echo.jsontest.com/results/10/term/' . urlencode($searchTerm));
            if ($results === false) {
                
            }
            
            $data = json_decode($results);
            if ($data === false) {
                
            }
            
            if (!isset($data->results) || !isset($data->term)) {
                
            }
            
            $entityData = [
                'term' => $data->term,
                'results' => $data->results,
            ];
            
            $search = $this->Searches->newEntity($entityData);
            if ($this->Searches->save($search)) {
                $this->Flash->success(__('The searches entry has been saved'));
                
                return $this->redirect(['action' => 'index']);
            }
        }
        
        $this->set(compact('search'));
        $this->set('_serialize', ['search']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Search id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $search = $this->Searches->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $search = $this->Searches->patchEntity($search, $this->request->getData());
            if ($this->Searches->save($search)) {
                $this->Flash->success(__('The search has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The search could not be saved. Please, try again.'));
        }
        $this->set(compact('search'));
        $this->set('_serialize', ['search']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Search id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $search = $this->Searches->get($id);
        if ($this->Searches->delete($search)) {
            $this->Flash->success(__('The search has been deleted.'));
        } else {
            $this->Flash->error(__('The search could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
