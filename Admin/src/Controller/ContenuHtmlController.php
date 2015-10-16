<?php
namespace Admin\Controller;

use Admin\Controller\AppController;

/**
 * ContenuHtml Controller
 *
 * @property \Admin\Model\Table\ContenuHtmlTable $ContenuHtml
 */
class ContenuHtmlController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pages']
        ];
        $this->set('contenuHtml', $this->paginate($this->ContenuHtml));
        $this->set('_serialize', ['contenuHtml']);
    }

    /**
     * View method
     *
     * @param string|null $id Contenu Html id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contenuHtml = $this->ContenuHtml->get($id, [
            'contain' => ['Pages']
        ]);
        $this->set('contenuHtml', $contenuHtml);
        $this->set('_serialize', ['contenuHtml']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contenuHtml = $this->ContenuHtml->newEntity();
        if ($this->request->is('post')) {
            $contenuHtml = $this->ContenuHtml->patchEntity($contenuHtml, $this->request->data);
            if ($this->ContenuHtml->save($contenuHtml)) {
                $this->Flash->success(__('The contenu html has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The contenu html could not be saved. Please, try again.'));
            }
        }
        $pages = $this->ContenuHtml->Pages->find('list', ['limit' => 200]);
        $this->set(compact('contenuHtml', 'pages'));
        $this->set('_serialize', ['contenuHtml']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contenu Html id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contenuHtml = $this->ContenuHtml->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contenuHtml = $this->ContenuHtml->patchEntity($contenuHtml, $this->request->data);
            if ($this->ContenuHtml->save($contenuHtml)) {
                $this->Flash->success(__('The contenu html has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The contenu html could not be saved. Please, try again.'));
            }
        }
        $pages = $this->ContenuHtml->Pages->find('list', ['limit' => 200]);
        $this->set(compact('contenuHtml', 'pages'));
        $this->set('_serialize', ['contenuHtml']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Contenu Html id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contenuHtml = $this->ContenuHtml->get($id);
        if ($this->ContenuHtml->delete($contenuHtml)) {
            $this->Flash->success(__('The contenu html has been deleted.'));
        } else {
            $this->Flash->error(__('The contenu html could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
