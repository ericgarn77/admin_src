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
    public function index($id = null)
    {

        
        $projet = $this->Caracteristiques->Projets->get($id);
        $caracteristiques = $this->Caracteristiques
        ->find()
        ->where(['projet_id' => $id ])
        ->order(['caracteristiques.id' => 'ASC']);

        $this->paginate = [
            'contain' => ['Projets'],
            'maxLimit' => 10
        ];

        $this->set('projet', $projet);
        $this->set('caracteristiques', $this->paginate($caracteristiques));
        $this->set('_serialize', ['caracteristiques']);
        $this->set('rowcount', $caracteristiques->count());
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
        $projet = $this->Caracteristiques->Projets->get($id);
        $caracteristique = $this->Caracteristiques->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $caracteristique = $this->Caracteristiques->patchEntity($caracteristique, $this->request->data);
            if ($this->Caracteristiques->save($caracteristique)) {
                $this->Flash->success(__('La modification a été enregistré avec succès !'));
                return $this->redirect(['action' => 'index', $projet->id]);
            } else {
                $this->Flash->error(__('La modification ne peut être enregistrer, réesseyer !'));
            }
        }
        $projets = $this->Caracteristiques->Projets->find();
        $this->set('data', [
            'title' => __("Modifier la caractéristique")
        ]);
        $this->set(compact('data'));
        $this->set('projet', $projet);
        $this->set(compact('caracteristique', 'projets'));
        $this->set('_serialize', ['caracteristique']);
        $this->layout = 'frame';
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
                    $caracteristique = $this->Caracteristiques->get($id);
                    $this->Caracteristiques->delete($caracteristique);
                }
                $this->Flash->success(__('Les caractéristiques ont bien été supprimé !'));
            }
            else if (count($checkbox) == 1)
            {
                $caracteristique = $this->Caracteristiques->get($checkbox[0]);
                $this->Caracteristiques->delete($caracteristique);
                $this->Flash->success(__('La caractéristique a bien été supprimée !'));
            }
            else
            {
                $this->Flash->error(__('Aucune selection n\'a été fait !'));
            }
        }
        return $this->redirect(['action' => 'index', $projet_id]);
    }
}
