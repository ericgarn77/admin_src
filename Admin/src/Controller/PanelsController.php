<?php
namespace Admin\Controller;

use Admin\Controller\AppController;

/**
 * Panels Controller
 *
 * @property \Admin\Model\Table\PanelsTable $Panels
 */
class PanelsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('panels', $this->paginate($this->Panels));
        $this->set('_serialize', ['panels']);
        $this->set('data', [
            'title' => __("Tableau de bord")
        ]);
        $this->set(compact('data'));
        $this->set('menu', [
            'panelSelected' => 'menuActifDash',
            'projetSelected' => null,
            'regionSelected' => null,
            'pageSelected' => null,
            'userSelected' => null,
            'gestionSelected' => null
        ]);   
    }
    /**
     * View method
     *
     * @param string|null $id Panel id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $panel = $this->Panels->get($id, [
            'contain' => []
        ]);
        $this->set('panel', $panel);
        $this->set('_serialize', ['panel']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $panel = $this->Panels->newEntity();
        if ($this->request->is('post')) {
            $panel = $this->Panels->patchEntity($panel, $this->request->data);
            if ($this->Panels->save($panel)) {
                $this->Flash->success(__('The panel has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The panel could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('panel'));
        $this->set('_serialize', ['panel']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Panel id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $panel = $this->Panels->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $panel = $this->Panels->patchEntity($panel, $this->request->data);
            if ($this->Panels->save($panel)) {
                $this->Flash->success(__('The panel has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The panel could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('panel'));
        $this->set('_serialize', ['panel']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Panel id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $panel = $this->Panels->get($id);
        if ($this->Panels->delete($panel)) {
            $this->Flash->success(__('The panel has been deleted.'));
        } else {
            $this->Flash->error(__('The panel could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
