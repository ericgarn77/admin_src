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

    public function addGaleries()
    {
        if ($this->request->is('post')) 
        {
            
            $gals = $this->request->data;


            foreach ($gals as $gal) {
                foreach ($gal as $v) {
                    $galerie = $this->Galeries->newEntity();
                    $galerie->projet_id = $v['projet_id'];
                    $galerie->nom = $v['nom'];

                    if ($this->Galeries->save($galerie)) {
                        $success = true;
                        
                    }
                    else
                    {
                        $success = false;
                        
                    }

                }
                if($success)
                {
                    $o = [
                        'msg' => 'La galerie d\'images à été sauvegardé avec succès !'

                    ];
                    echo json_encode($o);
                }
                else
                {
                    $o = [

                        'error' => 'Impossible de sauvegarder la galerie d\'images !'
                    ];
                    echo json_encode($o);
                }
                
            }
            // if ($this->Galeries->save($galery)) {
            //     $this->Flash->success(__('The galery has been saved.'));
            //     return $this->redirect(['action' => 'index']);
            // } else {
            //     $this->Flash->error(__('The galery could not be saved. Please, try again.'));
            // }

            // $query = $this->Galeries->query();
            //     $query->insert(['projet_id', 'nom'])
            //         ->values([
            //             'projet_id' => 1,
            //             'nom' => $gal
            //     ])
            //     ->execute();
            // if (count($checkbox) > 1)
            // {
            //     foreach($checkbox as $id)
            //     {
            //         $projet = $this->Projets->get($id);
            //         $this->Projets->delete($projet);
            //     }
            //     $this->Flash->success(__('Les projets ont bien été supprimé !'));
            // }
            // else if (count($checkbox) == 1)
            // {
            //     $region = $this->Projets->get($checkbox[0]);
            //     $this->Projets->delete($projet);
            //     $this->Flash->success(__('Le projet a bien été supprimé !'));
            // }
            // else
            // {
            //     $this->Flash->error(__('Aucune selection n\'a été fait !'));
            // }
            return $this->response;
        }
    }

    public function uploadGalerie()
    {
        
        if ($this->request->is('post'))
        {
            

                $fileName = $this->request->header('x-file-name');
                $fileType = $this->request->header('x-file-type');
                $fileSize = $this->request->header('x-file-size');
                $dossier = $this->request->header('x-file-dossier');
                $types = array('image/png', 'image/gif', 'image/jpeg');
                $path = 'php://input';
                $source = file_get_contents($path);

                if(!in_array($fileType, $types))
                {
                    $o = ['error' => 'Format non supporté'];
                    echo json_encode($o);
                    return $this->response;
                }
                else
                {
                    define('UPLOAD_DIR', ROOT.'/plugins/Admin/webroot/img/projets/'.$dossier.'/');
                    $file_dir = UPLOAD_DIR . $fileName;
                    file_put_contents($file_dir, $source);
                    $o = [  
                        'name' => $fileName, 
                        'img' => '<img src="/admin/img/projets/'.$dossier.'/'.$fileName.'" alt="'.$fileName.'" />'
                        
                    ];
                    echo json_encode($o);
                    return $this->response;
                }

            

        }
        
    }
}
