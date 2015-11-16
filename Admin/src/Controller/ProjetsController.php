<?php
namespace Admin\Controller;

use Admin\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 * Projets Controller
 *
 * @property \Admin\Model\Table\ProjetsTable $Projets
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
        
        $query = $this->Projets->find();
        $this->paginate = [
            'contain' => ['Regions'],
            'maxLimit' => 10
        ];
        $this->set('projets', $this->paginate($this->Projets));
        $this->set('_serialize', ['projets']);
        $this->set('rowcount', $query->count());
        $this->set('data', [
            'title' => __("Projets")
        ]);
        $this->set('menu', [
            'panelSelected' => null,
            'projetSelected' => 'menuActifDash',
            'regionSelected' => null,
            'pageSelected' => null,
            'userSelected' => null,
            'gestionSelected' => null
        ]);
        $this->set(compact('menu'));
        $this->set(compact('data'));
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
                $this->Flash->success(__('Le projet a été enregistrée !'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Le projet n\'a pu être enregistré. Réesseyez !'));
            }
        }

        $folder = new Folder(ROOT.'/plugins/Admin/webroot/img/projets/');
        $foldersTree = $folder->tree();
        $foldersImages = $foldersTree[0];
        $folders = [];
        foreach($foldersImages as $folderImg)
        {
            $parts = explode('/', $folderImg);
            $folderName = end($parts);
            if($folderName != '')
            {
                array_push($folders, $folderName);
            }
            
        }
        
        $regions = $this->Projets->Regions->find();
        $this->set('regions', $regions);
        $this->set('projet', $projet);
        $this->set('_serialize', ['projet']);
        $this->set('_serialize', ['regions']);
        $this->set('data', [
            'title' => __("Ajouter un projet"),
            'folders' => $folders
        ]);
        $this->set(compact('data'));
        $this->set('menu', [
            'panelSelected' => null,
            'projetSelected' => 'menuActifDash',
            'regionSelected' => null,
            'pageSelected' => null,
            'userSelected' => null,
            'gestionSelected' => null
        ]);
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
        $region = $this->Projets->Regions->get($projet->region_id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projet = $this->Projets->patchEntity($projet, $this->request->data);
            if ($this->Projets->save($projet)) {
                $this->Flash->success(__('Les changements ont bien été enregistré !'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Impossible d\'enregistrer les changements. Veuillez réesseyer !'));
            }
        }

        $folder = new Folder(ROOT.'/plugins/Admin/webroot/img/projets/');
        $foldersTree = $folder->tree();
        $foldersImages = $foldersTree[0];
        $folders = [];
        foreach($foldersImages as $folderImg)
        {
            $parts = explode('/', $folderImg);
            $folderName = end($parts);
            if($folderName != '')
            {
                array_push($folders, $folderName);
            }
            
        }

        $regions = $this->Projets->Regions->find();
        $this->set(compact('projet', 'regions'));
        $this->set('_serialize', ['projet']);
        $this->set('region', $region);
        $this->set('_serialize', ['region']);
        $this->set('data', [
            'title' => __("Modifier un projet"),
            'folders' => $folders
        ]);
        $this->set(compact('data'));
        $this->set('menu', [
            'panelSelected' => null,
            'projetSelected' => 'menuActifDash',
            'regionSelected' => null,
            'pageSelected' => null,
            'userSelected' => null,
            'gestionSelected' => null
        ]);
        
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
        
       
        $projet = $this->Projets->get($id);
        if ($this->Projets->delete($projet)) {
            $this->Flash->success(__('Le projet a été supprimé avec succès !'));
        } else {
            $this->Flash->error(__('Le projet ne peut être supprimé. Esseyez à nouveau !'));
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
                    $projet = $this->Projets->get($id);
                    $this->Projets->delete($projet);
                }
                $this->Flash->success(__('Les projets ont bien été supprimé !'));
            }
            else if (count($checkbox) == 1)
            {
                $projet = $this->Projets->get($checkbox[0]);
                $this->Projets->delete($projet);
                $this->Flash->success(__('Le projet a bien été supprimé !'));
            }
            else
            {
                $this->Flash->error(__('Aucune selection n\'a été fait !'));
            }
        }
        return $this->redirect(['action' => 'index']);
    }

    public function uploadImage()
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
            else if(empty($dossier))
            {
                $o = ['error' => 'Veuillez choisir un dossier d\'images avant !'];
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

    public function uploadPDF()
    {
        
        if ($this->request->is('post'))
        {
            $fileName = $this->request->header('x-file-name');
            $fileType = $this->request->header('x-file-type');
            $fileSize = $this->request->header('x-file-size');
            $types = array('application/pdf');
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
                define('UPLOAD_DIR', ROOT.'/plugins/Admin/webroot/img/pdf/');
                $file_dir = UPLOAD_DIR . $fileName;
                file_put_contents($file_dir, $source);
                $o = [  
                    'name' => $fileName, 
                    'img' => '<img src="/admin/img/comrad/iconePdf.jpg" alt="'.$fileName.'" />'
                ];
                echo json_encode($o);
                return $this->response;
            }
            
        }
        
    }
        
}
