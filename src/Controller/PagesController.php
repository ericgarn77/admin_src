<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{

    /**
     * Displays a view
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function display()
    {
        $path = func_get_args();

        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }

    public function index()
    {

        $pages = TableRegistry::get('Pages');
        $query = $pages->find()->where(['nom' => 'Accueil' ]);
        $currentPage = $query->first();
        $query = $pages->contenuHtml->find()->where(['page_id' => $currentPage->id]);
        $contents = $query->toArray();
        $this->set('data', [
            'title' => __("Accueil - Audrey Matte - Courtier immobilier")
        ]);
        $this->set('menu', [
            'accueil' => 'Accueil',
            'profil' => 'Profil',
            'projets' => 'Mes Projets',
            'terrains' => 'Terrains',
            'plan' => 'Plan de maison',
            'inscriptions' => 'Mes Inscriptions',
            'contact' => 'Contacts',
            'selected-accueil' => 'selected',
            'selected-projet' => null,
            'selected-terrain' => null,
            'selected-plan' => null
        ]);
        $this->set(compact('data'));
        $this->set(compact('menu'));
        $this->set('contents', $contents);
        $this->set('currentPage', $currentPage);
        $this->layout = 'accueil';

    }

    public function projets()
    {

        $pages = TableRegistry::get('Pages');
        $query = $pages->find()->where(['nom' => 'Mes projets' ]);
        $currentPage = $query->first();
        $query = $pages->contenuHtml->find()->where(['page_id' => $currentPage->id]);
        $contents = $query->toArray();
        $this->set('data', [
            'title' => __("Accueil - Audrey Matte - Courtier immobilier")
        ]);
        $this->set('menu', [
            'accueil' => 'Accueil',
            'profil' => 'Profil',
            'projets' => 'Mes Projets',
            'terrains' => 'Terrains',
            'plan' => 'Plan de maison',
            'inscriptions' => 'Mes Inscriptions',
            'contact' => 'Contacts',
            'selected-accueil' => null,
            'selected-projet' => 'selected',
            'selected-terrain' => null,
            'selected-plan' => null
        ]);
        $this->set(compact('data'));
        $this->set(compact('menu'));
        $this->set('contents', $contents);
        $this->set('currentPage', $currentPage);
        $this->layout = 'accueil';

    }
}















