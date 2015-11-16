<?php

namespace Admin\Controller;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

use App\Controller\AppController as BaseController;

class AppController extends BaseController
{
	public function initialize()
    {
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'loginRedirect' => [
            	'controller' => 'Panels',
            	'action' => 'index'
            ],
            'logoutRedirect' => [
            	'controller' => 'Users',
            	'action' => 'login'
            ],
            'unauthorizedRedirect' => [
            	'controller' => 'Users',
            	'action' => 'login'
            ]
        ]);

        // Autorise l'action display pour que notre controller de pages
        // continue de fonctionner.
        $this->Auth->allow(['display']);
        $user = $this->Auth->user();
        $this->set(compact('user'));
        	
    }

    public function index()
    {
        
        $this->set('data', [
            'title' => __("Gestion")
        ]);
        $this->set(compact('data'));
        $this->set('menu', [
            'panelSelected' => null,
            'projetSelected' => null,
            'regionSelected' => null,
            'pageSelected' => null,
            'userSelected' => null,
            'gestionSelected' => 'menuActifDash'
        ]);
    }

    public function addDirImg()
    {

        if ($this->request->is('post'))
        {
            $dossier_nom = $this->request->data['dossier_nom'];
            $folder = new Folder(ROOT.'/plugins/Admin/webroot/img/projets/');
            $folder->create($dossier_nom);
            $this->Flash->success(__('Le dossier a été créé avec succès !'));
            return $this->redirect(['action' => 'index']);

        }
        $this->set('data', [
            'title' => __("Ajouter un dossier d'images")
        ]);
        $this->set(compact('data'));
        
    }
}
