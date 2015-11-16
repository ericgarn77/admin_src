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
 * Terrains Controller
 *
 * @property \App\Model\Table\TerrainsTable $Terrains
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
        $pages = TableRegistry::get('Pages');
        $query = $pages->find()->where(['nom' => 'Terrains' ]);
        $currentPage = $query->first();

        $query = $pages->contenuHtml->find()->where(['page_id' => $currentPage->id]);
        $contents = $query->toArray();

        $this->set('data', [
            'title' => __("Terrains - Audrey Matte - Courtier Immobilier"),
            'projet' => null,
            'full_page' => '<div id="full_page">
                                <div id="tips"><a id="up" href="#" title="haut de la page">haut de la page</a>
                            </div>'

        ]);
        $this->set('menu', [
            'selected-accueil' => null,
            'selected-projet' => null,
            'selected-terrain' => 'selected',
            'selected-plan' => null
        ]);

        // $query = $this->Terrains->Regions->find()->where(['terrain' => 'oui',])->order(['order_region' => 'ASC']);
        // $regions = $query->toArray();
        // debug($regions);

        $query = $this->Terrains->Projets->find()->where(['terrain' => 'oui']);
        $developpements = $query->toArray();
        
        $arrayVendre = [];
        $arrayVendu = [];

        
        $query = $this->Terrains->Projets->find()->where(['terrain' => 'oui', 'statut' => 'À vendre'])->order(['order_terrains' => 'ASC']);
        $projets = $query->toArray();
        foreach($projets as $projet)
        {
            $query = $this->Terrains->find()->where(['terrains.projet_id' => $projet->id]);
            $projetTerrains = $query->toArray();
            $region = $this->Terrains->Regions->get($projet->region_id);
            $datas = [
                'region_nom' => $region->nom,
                'region_option' => $region->option,
                'projet' => $projet,
                'projetTerrains' => $projetTerrains
                ];
            array_push($arrayVendre, $datas);    
        }
            
        
        

        // foreach($regions as $region)
        // {
        //     $query = $this->Terrains->Projets->find()->where(['region_id' => $region->id, 'statut' => 'Vendu']);
        //     $projets = $query->toArray();
        //     foreach($projets as $projet)
        //     {
        //         $query = $this->Terrains->find()->where(['terrains.projet_id' => $projet->id]);
        //         $projetTerrains = $query->toArray();
        //         $datas = [
        //             'region_nom' => $region->nom,
        //             'region_option' => $region->option,
        //             'projets' => $projets,
        //             'projetTerrains' => $projetTerrains
        //             ];
        //         array_push($arrayVendu, $datas);    
        //     }
            
        // }

        // $this->set('regions', $regions);
        $this->set('developpements', $developpements);
        $this->set('arrayVendre', $arrayVendre);
        // $this->set('arrayVendu', $arrayVendu);
        $this->set('contents', $contents);
        $this->set('currentPage', $currentPage);
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
