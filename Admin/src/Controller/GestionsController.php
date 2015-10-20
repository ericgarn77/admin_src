<?php
namespace Admin\Controller;

use Admin\Controller\AppController;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 * Gestions Controller
 *
 * @property \Admin\Model\Table\GestionsTable $Gestions
 */
class GestionsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('gestions', $this->paginate($this->Gestions));
        $this->set('_serialize', ['gestions']);
        $this->set('data', [
            'title' => __("Gestion")
        ]);
        $this->set(compact('data'));
    }

    /**
     * View method
     *
     * @param string|null $id Gestion id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $gestion = $this->Gestions->get($id, [
            'contain' => []
        ]);
        $this->set('gestion', $gestion);
        $this->set('_serialize', ['gestion']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $gestion = $this->Gestions->newEntity();
        if ($this->request->is('post')) {
            $gestion = $this->Gestions->patchEntity($gestion, $this->request->data);
            if ($this->Gestions->save($gestion)) {
                $this->Flash->success(__('The gestion has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The gestion could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('gestion'));
        $this->set('_serialize', ['gestion']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Gestion id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $gestion = $this->Gestions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $gestion = $this->Gestions->patchEntity($gestion, $this->request->data);
            if ($this->Gestions->save($gestion)) {
                $this->Flash->success(__('The gestion has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The gestion could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('gestion'));
        $this->set('_serialize', ['gestion']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Gestion id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gestion = $this->Gestions->get($id);
        if ($this->Gestions->delete($gestion)) {
            $this->Flash->success(__('The gestion has been deleted.'));
        } else {
            $this->Flash->error(__('The gestion could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function addDirImg()
    {

        if ($this->request->is('post'))
        {
            $dossier_nom = $this->request->data['dossier_nom'];
            $folder = new Folder(ROOT.'/plugins/Admin/webroot/img/projets/');
            $folder->create($dossier_nom);
            $this->Flash->success(__('Le dossier a été créé avec succès !'));
            return $this->redirect(['action' => 'index']);

        }
        $this->set('data', [
            'title' => __("Ajouter un dossier d'images")
        ]);
        $this->set(compact('data'));
        

    }











}
