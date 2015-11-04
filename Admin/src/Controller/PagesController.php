<?php
namespace Admin\Controller;

use Admin\Controller\AppController;
use Cake\ORM\TableRegistry;


/**
 * Pages Controller
 *
 * @property \Admin\Model\Table\PagesTable $Pages
 */
class PagesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        
        $pages = $this->Pages->find();
        $this->paginate = [
            'maxLimit' => 10
        ];
        $this->set('pages', $this->paginate($this->Pages));
        $this->set('_serialize', ['pages']);
        $this->set('rowcount', $pages->count());
        $this->set('data', [
            'title' => __("Pages du site")
        ]);
        $this->set(compact('data'));
    }

    /**
     * View method
     *
     * @param string|null $id Page id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $page = $this->Pages->get($id, [
            'contain' => ['ContenuHtml']
        ]);
        $this->set('page', $page);
        $this->set('_serialize', ['page']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        
        $page = $this->Pages->newEntity();
        if ($this->request->is('post')) {
            $page = $this->Pages->patchEntity($page, $this->request->data);
            if ($this->Pages->save($region)) {
                $this->Flash->success(__('La page a été enregistrée !'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('La page n\'a pu être enregistré. Réesseyez !'));
                return $this->redirect(['action' => 'index']);
            }
        }
        $this->set('data', [
            'title' => __("Ajouter une page")
        ]);
        $this->set(compact('data'));
        $this->set(compact('page'));
        $this->set('_serialize', ['page']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Page id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $page = $this->Pages->get($id, [
            'contain' => []
        ]);
        $contents = $this->Pages->ContenuHtml->find()->where(['page_id' => $id ]);
        

        if ($this->request->is(['patch', 'post', 'put'])) {
            $page = $this->Pages->patchEntity($page, $this->request->data);
            if ($this->Pages->save($page)) {
                $this->Flash->success(__('Les changements ont bien été enregistré !'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Impossible d\'enregistrer les changements. Veuillez réesseyer !'));
            }
        }

        $this->set('contents', $contents);
        $this->set('data', [
            'title' => __("Modifier la page")
        ]);
        $this->set(compact('data'));
        $this->set(compact('page'));
        $this->set('_serialize', ['page']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Page id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $page = $this->Pages->get($id);
        if ($this->Pages->delete($page)) {
            $this->Flash->success(__('La page bien été supprimé !'));
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
                    $page = $this->Pages->get($id);
                    $this->Pages->delete($page);
                }
                $this->Flash->success(__('Les pages ont bien été supprimé !'));
            }
            else if (count($checkbox) == 1)
            {
                $page = $this->Regions->get($checkbox[0]);
                $this->Pages->delete($page);
                $this->Flash->success(__('La page a bien été supprimé !'));
            }
            else
            {
                $this->Flash->error(__('Aucune selection n\'a été fait !'));
            }
        }
        return $this->redirect(['action' => 'index']);
    }
}
