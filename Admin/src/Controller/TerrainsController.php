<?php
namespace Admin\Controller;

use Admin\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\ORM\Query;

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
    public function index($id = null)
    {
        
        $projet = $this->Terrains->Projets->get($id);

        $terrains = $this->Terrains
        ->find()
        ->where(['projet_id' => $id ])
        ->order(['terrains.id' => 'ASC']);

        $region = $this->Terrains->Regions->get($projet->region_id);

        $this->paginate = [
            'contain' => ['Projets'],
            'maxLimit' => 10
        ];

        $this->set('projet', $projet);
        $this->set('region', $region);
        $this->set('terrains', $this->paginate($terrains));
        $this->set('_serialize', ['terrains']);
        $this->set('rowcount', $terrains->count());
        $this->set('data', [
            'title' => __("Terrains")
        ]);
        $this->set(compact('data'));
        $this->layout = 'frame';
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
    public function add($id = null)
    {
        $terrain = $this->Terrains->newEntity();
        $projet = $this->Terrains->Projets->get($id);
        $region = $this->Terrains->Regions->get($projet->region_id);

        if ($this->request->is('post')) {
            
            $terrain = $this->Terrains->patchEntity($terrain, $this->request->data);
            if ($this->Terrains->save($terrain)) {
                $this->Flash->success(__('Le terrain a été enregistrée !'));
                return $this->redirect(['action' => 'index', $projet->id]);
            } else {
                $this->Flash->error(__('Le terrain n\'a pu être enregistré. Réesseyez !'));
            }
        }
        
        $projets = $this->Terrains->Projets->find();
        $this->set('data', [
            'title' => __("Ajouter un terrain")
        ]);
        $this->set(compact('data'));
        $this->set('projet', $projet);
        $this->set('region', $region);
        $this->set(compact('terrain', 'projets'));
        $this->set('_serialize', ['terrain']);
        $this->layout = 'frame';
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
            'contain' => ['Projets', 'Regions']
        ]);
        
        
        $projet = $this->Terrains->Projets->get($terrain->projet_id);
        $region = $this->Terrains->Regions->get($terrain->region_id);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $terrain = $this->Terrains->patchEntity($terrain, $this->request->data);
            if ($this->Terrains->save($terrain)) {
                $this->Flash->success(__('Le terrain a bien été modifié !'));
                return $this->redirect(['action' => 'index', $projet->id]);
            } else {
                $this->Flash->error(__('Le terrain ne peut être modifié ! Réesseyer'));
            }
        }

        $this->set('projet', $projet);
        $this->set('region', $region);
        $projets = $this->Terrains->Projets->find();
        $regions = $this->Terrains->Regions->find();
        $this->set(compact('terrain', 'projets', 'regions'));
        $this->set('_serialize', ['terrain']);
        $this->set('data', [
            'title' => __("Modifier le terrain")
        ]);
        $this->set(compact('data'));
        $this->layout = 'frame';
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
       
        $terrain = $this->Terrains->get($id);
        $projet_id = $terrain->projet_id;
        if ($this->Terrains->delete($terrain)) {
            $this->Flash->success(__('Le terrain a bien été supprimé !'));
        } else {
            $this->Flash->error(__('Le terrain n\'a pas été supprimmé ! Réesseyer'));
        }
        return $this->redirect(['action' => 'index', $projet_id]);
    }

    public function deleteSelected()
    {
        
        if ($this->request->is('post')) 
        {
            $projet_id = $this->request->data['projet_id'];
            $checkbox = $this->request->data['checkbox'];
            if (count($checkbox) > 1)
            {
                foreach($checkbox as $id)
                {
                    $terrain = $this->Terrains->get($id);
                    $this->Terrains->delete($terrain);
                }
                $this->Flash->success(__('Les terrains ont bien été supprimés !'));
            }
            else if (count($checkbox) == 1)
            {
                $terrain = $this->Terrains->get($checkbox[0]);
                $this->Terrains->delete($terrain);
                $this->Flash->success(__('Le terrain a bien été supprimée !'));
            }
            else
            {
                $this->Flash->error(__('Aucune selection n\'a été fait !'));
            }
        }
        return $this->redirect(['action' => 'index', $projet_id]);
    }
}
