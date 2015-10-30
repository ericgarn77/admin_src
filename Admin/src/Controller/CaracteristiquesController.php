<?php
namespace Admin\Controller;

use Admin\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\ORM\Query;

/**
 * Caracteristiques Controller
 *
 * @property \Admin\Model\Table\CaracteristiquesTable $Caracteristiques
 */
class CaracteristiquesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {

        
        $projet = $this->Caracteristiques->Projets->get($id);
        $query = $this->Caracteristiques
        ->find()
        ->where(['projet_id' => $id ])
        ->order(['id' => 'ASC']);

        $this->paginate = [
            'contain' => ['Projets'],
            'maxLimit' => 10
        ];

        $this->set('projet', $projet);
        $this->set('caracteristiques', $this->paginate($this->Caracteristiques));
        $this->set('_serialize', ['caracteristiques']);
        $this->set('rowcount', $query->count());
        $this->set('data', [
            'title' => __("Caracteristiques")
        ]);
        $this->set(compact('data'));
        $this->layout = 'frame';
    }

    /**
     * View method
     *
     * @param string|null $id Caracteristique id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $caracteristique = $this->Caracteristiques->get($id, [
            'contain' => ['Projets']
        ]);
        $this->set('caracteristique', $caracteristique);
        $this->set('_serialize', ['caracteristique']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $caracteristique = $this->Caracteristiques->newEntity();
        if ($this->request->is('post')) {
            $caracteristique = $this->Caracteristiques->patchEntity($caracteristique, $this->request->data);
            if ($this->Caracteristiques->save($caracteristique)) {
                $this->Flash->success(__('The caracteristique has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The caracteristique could not be saved. Please, try again.'));
            }
        }
        $projets = $this->Caracteristiques->Projets->find('list', ['limit' => 200]);
        $this->set(compact('caracteristique', 'projets'));
        $this->set('_serialize', ['caracteristique']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Caracteristique id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $caracteristique = $this->Caracteristiques->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $caracteristique = $this->Caracteristiques->patchEntity($caracteristique, $this->request->data);
            if ($this->Caracteristiques->save($caracteristique)) {
                $this->Flash->success(__('The caracteristique has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The caracteristique could not be saved. Please, try again.'));
            }
        }
        $projets = $this->Caracteristiques->Projets->find('list', ['limit' => 200]);
        $this->set(compact('caracteristique', 'projets'));
        $this->set('_serialize', ['caracteristique']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Caracteristique id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $caracteristique = $this->Caracteristiques->get($id);
        if ($this->Caracteristiques->delete($caracteristique)) {
            $this->Flash->success(__('The caracteristique has been deleted.'));
        } else {
            $this->Flash->error(__('The caracteristique could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
