<?php
namespace Admin\Controller;

use Admin\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\ORM\Query;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 * Galeries Controller
 *
 * @property \Admin\Model\Table\GaleriesTable $Galeries
 */
class GaleriesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Projets']
        ];
        $this->set('galeries', $this->paginate($this->Galeries));
        $this->set('_serialize', ['galeries']);
        $this->set('data', [
            'title' => __("Galerie d'images")
        ]);
        $this->set(compact('data'));
        $this->layout = 'frame';
    }

    /**
     * View method
     *
     * @param string|null $id Galery id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $galery = $this->Galeries->get($id, [
            'contain' => ['Projets']
        ]);
        $this->set('galery', $galery);
        $this->set('_serialize', ['galery']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $galery = $this->Galeries->newEntity();
        if ($this->request->is('post')) {
            $galery = $this->Galeries->patchEntity($galery, $this->request->data);
            if ($this->Galeries->save($galery)) {
                $this->Flash->success(__('The galery has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The galery could not be saved. Please, try again.'));
            }
        }
        $projets = $this->Galeries->Projets->find('list', ['limit' => 200]);
        $this->set(compact('galery', 'projets'));
        $this->set('_serialize', ['galery']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Galery id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        
        $projet = $this->Galeries->Projets->get($id);
        $galeries = $this->Galeries
        ->find()
        ->where(['projet_id' => $id ])
        ->order(['order_image' => 'ASC']);

        $this->set('data', [
            'title' => __("Galerie d'images")
        ]);
        $this->set('projet', $projet);
        $this->set('galeries', $galeries);
        $this->set(compact('data'));
        $this->layout = 'frame';
        // $galery = $this->Galeries->get($id, [
        //     'contain' => []
        // ]);
        // if ($this->request->is(['patch', 'post', 'put'])) {
        //     $galery = $this->Galeries->patchEntity($galery, $this->request->data);
        //     if ($this->Galeries->save($galery)) {
        //         $this->Flash->success(__('The galery has been saved.'));
        //         return $this->redirect(['action' => 'index']);
        //     } else {
        //         $this->Flash->error(__('The galery could not be saved. Please, try again.'));
        //     }
        // }
        // $projets = $this->Galeries->Projets->find('list', ['limit' => 200]);
        // $this->set(compact('galery', 'projets'));
        // $this->set('_serialize', ['galery']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Galery id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $galery = $this->Galeries->get($id);
        if ($this->Galeries->delete($galery)) {
            $this->Flash->success(__('The galery has been deleted.'));
        } else {
            $this->Flash->error(__('The galery could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function uploadGalerie()
    {
        
        if ($this->request->is('patch', 'post', 'put'))
        {
            
            $galeries = $this->request->data['galeries'];
            $this->set('galeries', $galeries);

            // foreach($galeries as $galerie)
            // {

            //     $fileName = $this->request->header('x-file-name');
            //     $fileType = $this->request->header('x-file-type');
            //     $fileSize = $this->request->header('x-file-size');
            //     $dossier = $this->request->header('x-file-dossier');
            //     $types = array('image/png', 'image/gif', 'image/jpeg');
            //     $path = 'php://input';
            //     $source = file_get_contents($path);

            //     if(!in_array($fileType, $types))
            //     {
            //         $o = ['error' => 'Format non supporté'];
            //         echo json_encode($o);
            //         return $this->response;
            //     }
            //     else
            //     {
            //         define('UPLOAD_DIR', ROOT.'/plugins/Admin/webroot/img/projets/'.$dossier.'/');
            //         $file_dir = UPLOAD_DIR . $fileName;
            //         file_put_contents($file_dir, $source);
            //         $o = [  
            //             'name' => $fileName, 
            //             'img' => '<img src="/admin/img/projets/'.$dossier.'/'.$fileName.'" alt="'.$fileName.'" />', 
            //             'par' => '<p class="upload-name">'.$fileName.'</p>'
                        
            //         ];
            //         echo json_encode($o);
            //         return $this->response;
            //     }

            // }

        }
        
    }
}
