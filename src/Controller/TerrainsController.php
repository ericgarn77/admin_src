<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 * Terrains Controller
 *
 * @property \App\Model\Table\TerrainsTable $Terrains
 */
class TerrainsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $pages = TableRegistry::get('Pages');
        $query = $pages->find()->where(['nom' => 'Terrains' ]);
        $currentPage = $query->first();

        $query = $pages->contenuHtml->find()->where(['page_id' => $currentPage->id]);
        $contents = $query->toArray();

        $this->set('data', [
            'title' => __("Terrains - Audrey Matte - Courtier Immobilier"),
            'projet' => null,
            'full_page' => '<div id="full_page">
                                <div id="tips"><a id="up" href="#" title="haut de la page">haut de la page</a>
                            </div>'

        ]);
        $this->set('menu', [
            'selected-accueil' => null,
            'selected-projet' => null,
            'selected-terrain' => 'selected',
            'selected-plan' => null
        ]);

        $query = $this->Terrains->Regions->find()->where(['terrain' => 'oui',])->order(['order_region' => 'ASC']);
        $regions = $query->toArray();
        
        $query = $this->Terrains->Projets->find()->where(['terrain' => 'oui']);
        $developpements = $query->toArray();
        
        $arrayVendre = [];
        $arrayVendu = [];

        
        $query = $this->Terrains->Projets->find()->where(['terrain' => 'oui', 'statut' => 'À vendre'])->order(['order_terrains' => 'ASC']);
        $projets = $query->toArray();
        foreach($projets as $projet)
        {
            $query = $this->Terrains->find()->where(['terrains.projet_id' => $projet->id]);
            $projetTerrains = $query->toArray();
            $region = $this->Terrains->Regions->get($projet->region_id);
            $datas = [
                'region_nom' => $region->nom,
                'region_option' => $region->option,
                'projetVendre' => $projet,
                'projetTerrains' => $projetTerrains
                ];
            array_push($arrayVendre, $datas);    
        }
            
        $query = $this->Terrains->Projets->find()->where(['terrain' => 'oui', 'statut' => 'Vendu'])->order(['order_terrains' => 'ASC']);
        $projets = $query->toArray();
        foreach($projets as $projet)
        {

            $query = $this->Terrains->find()->where(['terrains.projet_id' => $projet->id]);
            $projetTerrains = $query->toArray();
            $region = $this->Terrains->Regions->get($projet->region_id);
            $datas = [
                'region_nom' => $region->nom,
                'region_option' => $region->option,
                'projetVendu' => $projet,
                'projetTerrains' => $projetTerrains
                ];
            array_push($arrayVendu, $datas);    
        }
           
        $this->set('regions', $regions);
        $this->set('developpements', $developpements);
        $this->set('arrayVendre', $arrayVendre);
        $this->set('arrayVendu', $arrayVendu);
        $this->set('contents', $contents);
        $this->set('currentPage', $currentPage);
        $this->paginate = [
            'contain' => ['Projets', 'Regions']
        ];
        $this->set('terrains', $this->paginate($this->Terrains));
        $this->set('_serialize', ['terrains']);
    }

    
}
