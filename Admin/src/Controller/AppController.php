<?php

namespace Admin\Controller;

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
}
