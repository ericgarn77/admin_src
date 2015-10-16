<?php
namespace Admin\Controller;

use Admin\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Regions Controller
 *
 * @property \Admin\Model\Table\RegionsTable $Regions
 */
class RegionsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        
        $items = TableRegistry::get('Regions');
        $query = $items->find();
        $this->paginate = [
            'maxLimit' => 10
        ];
        $this->set('regions', $this->paginate($this->Regions));
        $this->set('_serialize', ['regions']);
        $this->set('rowcount', $query->count());
        $this->set('data', [
            'title' => __("Régions")
        ]);
        $this->set(compact('data'));

    }

    /**
     * View method
     *
     * @param string|null $id Region id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $region = $this->Regions->get($id, [
            'contain' => ['Projets', 'Terrains']
        ]);
        $this->set('region', $region);
        $this->set('_serialize', ['region']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $region = $this->Regions->newEntity();
        if ($this->request->is('post')) {
            $region = $this->Regions->patchEntity($region, $this->request->data);
            if ($this->Regions->save($region)) {
                $this->Flash->success(__('La région a été enregistrée !'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('La région n\'a pu être enregistré. Réesseyez !'));
                return $this->redirect(['action' => 'index']);
            }
        }
        $this->set('data', [
            'title' => __("Ajouter une région")
        ]);
        $this->set(compact('data'));
        $this->set(compact('region'));
        $this->set('_serialize', ['region']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Region id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $region = $this->Regions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $region = $this->Regions->patchEntity($region, $this->request->data);
            if ($this->Regions->save($region)) {
                $this->Flash->success(__('Les changements ont bien été enregistré !'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Impossible d\'enregistrer les changements. Veuillez réesseyer !'));
            }
        }
        $this->set('data', [
            'title' => __("Modifier la région")
        ]);
        $this->set(compact('data'));
        $this->set(compact('region'));
        $this->set('_serialize', ['region']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Region id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        // $this->request->allowMethod(['post', 'delete']);
        $region = $this->Regions->get($id);
        if ($this->Regions->delete($region)) {
            $this->Flash->success(__('La région a bien été supprimé !'));
        } else {
            $this->Flash->error(__('Impossible de supprimer. Veuillez réesseyer !'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function deleteSelected()
    {
        
        if ($this->request->is('post')) 
        {
            
            $checkbox = $this->request->data['checkbox'];
            
            if (count($checkbox) > 1)
            {
                foreach($checkbox as $id)
                {
                    $region = $this->Regions->get($id);
                    $this->Regions->delete($region);
                }
                $this->Flash->success(__('Les régions ont bien été supprimé !'));
            }
            else if (count($checkbox) == 1)
            {
                $region = $this->Regions->get($checkbox[0]);
                $this->Regions->delete($region);
                $this->Flash->success(__('La région a bien été supprimé !'));
            }
            else
            {
                $this->Flash->error(__('Aucune selection n\'a été fait !'));
            }
        }
        return $this->redirect(['action' => 'index']);
    }
}
