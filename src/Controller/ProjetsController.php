<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 * Projets Controller
 *
 * @property \App\Model\Table\ProjetsTable $Projets
 */
class ProjetsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        
        $pages = TableRegistry::get('Pages');
        $query = $pages->find()->where(['nom' => 'Mes projets' ]);
        $currentPage = $query->first();
        
        $query = $pages->contenuHtml->find()->where(['page_id' => $currentPage->id]);
        $contents = $query->toArray();
        
        $this->set('data', [
            'title' => __("Nos projets - Audrey Matte - Courtier Immobilier"),
            'projet' => null
        ]);
        $this->set('menu', [
            'selected-accueil' => null,
            'selected-projet' => 'selected',
            'selected-terrain' => null,
            'selected-plan' => null
        ]);

        $query = $this->Projets->find()->where(['vedette' => 'oui']);
        $vedette = $query->first();

        $projets = $this->Projets->find()->where(['presentation' => 'oui'])->order(['order_projet' => 'ASC']);
    
        $this->set('vedette', $vedette);
        $this->set('contents', $contents);
        $this->set('currentPage', $currentPage);

        $this->paginate = [
            'contain' => ['Regions']
        ];
        $this->set('projets', $this->paginate($projets));

        
    }

    /**
     * View method
     *
     * @param string|null $id Projet id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        
        $pages = TableRegistry::get('Pages');
        $query = $pages->find()->where(['nom' => 'Mes projets' ]);
        $currentPage = $query->first();

        $projet = $this->Projets->get($id, [
            'contain' => ['Regions', 'Caracteristiques', 'Galeries', 'Terrains']
        ]);
        
        $caracteristiques = $this->Projets->Caracteristiques->find()->where(['caracteristiques.projet_id' => $id]);
        $galeries = $this->Projets->Galeries->find()->where(['galeries.projet_id' => $id]);
        $arrayGal = $galeries->toArray();
        
        $this->set('caractCount', $caracteristiques->count());
        
        $this->set('projet', $projet);
        $this->set('_serialize', ['projet']);
        $this->set('arrayGal', $arrayGal);
        $this->set('galeries', $galeries);
        $this->set('caracteristiques', $caracteristiques);
        $this->set('currentPage', $currentPage);

        $this->set('data', [
            'title' => __($projet->nom." - Audrey Matte - Courtier Immobilier"),
            'projet' => 'projet'
        ]);
        $this->set('menu', [
            'selected-accueil' => null,
            'selected-projet' => 'selected',
            'selected-terrain' => null,
            'selected-plan' => null
        ]);

    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projet = $this->Projets->newEntity();
        if ($this->request->is('post')) {
            $projet = $this->Projets->patchEntity($projet, $this->request->data);
            if ($this->Projets->save($projet)) {
                $this->Flash->success(__('The projet has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The projet could not be saved. Please, try again.'));
            }
        }
        $regions = $this->Projets->Regions->find('list', ['limit' => 200]);
        $this->set(compact('projet', 'regions'));
        $this->set('_serialize', ['projet']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Projet id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $projet = $this->Projets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projet = $this->Projets->patchEntity($projet, $this->request->data);
            if ($this->Projets->save($projet)) {
                $this->Flash->success(__('The projet has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The projet could not be saved. Please, try again.'));
            }
        }
        $regions = $this->Projets->Regions->find('list', ['limit' => 200]);
        $this->set(compact('projet', 'regions'));
        $this->set('_serialize', ['projet']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Projet id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projet = $this->Projets->get($id);
        if ($this->Projets->delete($projet)) {
            $this->Flash->success(__('The projet has been deleted.'));
        } else {
            $this->Flash->error(__('The projet could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

  
}
