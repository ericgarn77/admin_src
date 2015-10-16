<?php
namespace Admin\Controller;

use Admin\Controller\AppController;

/**
 * Terrains Controller
 *
 * @property \Admin\Model\Table\TerrainsTable $Terrains
 */
class TerrainsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Projets', 'Regions']
        ];
        $this->set('terrains', $this->paginate($this->Terrains));
        $this->set('_serialize', ['terrains']);
    }

    /**
     * View method
     *
     * @param string|null $id Terrain id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $terrain = $this->Terrains->get($id, [
            'contain' => ['Projets', 'Regions']
        ]);
        $this->set('terrain', $terrain);
        $this->set('_serialize', ['terrain']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $terrain = $this->Terrains->newEntity();
        if ($this->request->is('post')) {
            $terrain = $this->Terrains->patchEntity($terrain, $this->request->data);
            if ($this->Terrains->save($terrain)) {
                $this->Flash->success(__('The terrain has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The terrain could not be saved. Please, try again.'));
            }
        }
        $projets = $this->Terrains->Projets->find('list', ['limit' => 200]);
        $regions = $this->Terrains->Regions->find('list', ['limit' => 200]);
        $this->set(compact('terrain', 'projets', 'regions'));
        $this->set('_serialize', ['terrain']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Terrain id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $terrain = $this->Terrains->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $terrain = $this->Terrains->patchEntity($terrain, $this->request->data);
            if ($this->Terrains->save($terrain)) {
                $this->Flash->success(__('The terrain has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The terrain could not be saved. Please, try again.'));
            }
        }
        $projets = $this->Terrains->Projets->find('list', ['limit' => 200]);
        $regions = $this->Terrains->Regions->find('list', ['limit' => 200]);
        $this->set(compact('terrain', 'projets', 'regions'));
        $this->set('_serialize', ['terrain']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Terrain id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $terrain = $this->Terrains->get($id);
        if ($this->Terrains->delete($terrain)) {
            $this->Flash->success(__('The terrain has been deleted.'));
        } else {
            $this->Flash->error(__('The terrain could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
