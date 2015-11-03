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
    public function add($id = null)
    {

        $projet = $this->Caracteristiques->Projets->get($id);
        $this->set('data', [
            'title' => __("Ajouter des caractéristiques")
        ]);
        $this->set(compact('data'));
        $this->set('projet', $projet);
        $this->layout = 'frame';

    }



    public function addCaract()
    {
        
        if($this->request->is('post'))
        {
            $projet_id = $this->request->data['projet_id'];
            $projet = $this->Caracteristiques->Projets->get($projet_id);
            $caracteristiques = $this->request->data['nom'];

            if (count($caracteristiques) > 1)
            {
            
                foreach($caracteristiques as $v)
                {
                    $caracteristique = $this->Caracteristiques->newEntity();
                    $caracteristique->projet_id = $projet_id;
                    $caracteristique->nom = $v;
                    if ($this->Caracteristiques->save($caracteristique)) 
                    {
                        $success = true;
                        
                    }
                    else
                    {
                        $success = false;
                        
                    }
                }
                if ($success)
                {
                    $this->Flash->success(__('Les caractéristiques ont été enregistrés avec succès !'));
                    return $this->redirect(['action' => 'index', $projet->id]);
                } 
                else 
                {
                    $this->Flash->error(__('Les caractéristiques n\'ont pas été enregistrés, réesseyer !'));
                }


            }
            else if (count($caracteristiques) == 1)
            {
                $caracteristique = $this->Caracteristiques->newEntity();
                $caracteristique->projet_id = $projet_id;
                $caracteristique->nom = $v;
                if ($this->Caracteristiques->save($caracteristique)) 
                {
                    $this->Flash->success(__('La caractéristique a été enregistré avec succès !'));
                    return $this->redirect(['action' => 'index', $projet->id]);
                } 
                else 
                {
                    $this->Flash->error(__('La caractéristique n\'a pas été enregistré, réesseyer !'));
                }
            }

            $this->layout = 'frame';
        }
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
        $projet = $this->Caracteristiques->Projets->get($caracteristique->projet_id);
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
        
        $caracteristique = $this->Caracteristiques->get($id);
        $projet_id = $caracteristique->projet_id;
        if ($this->Caracteristiques->delete($caracteristique)) {
            $this->Flash->success(__('La caractéristique à bien été supprimé !'));
        } else {
            $this->Flash->error(__('La caractéristique n\'a pas été supprimé. Réesseyer !'));
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
