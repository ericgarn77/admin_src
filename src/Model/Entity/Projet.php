<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Projet Entity.
 *
 * @property int $id
 * @property int $region_id
 * @property \App\Model\Entity\Region $region
 * @property string $nom
 * @property string $adresse
 * @property string $description
 * @property int $order_presentation
 * @property int $order_terrains
 * @property string $statut
 * @property string $vedette
 * @property string $url_map
 * @property string $plan_pdf
 * @property string $dossier_image
 * @property string $image
 * @property string $presentation
 * @property string $terrain
 * @property string $alias
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\Caracteristique[] $caracteristiques
 * @property \App\Model\Entity\Galery[] $galeries
 * @property \App\Model\Entity\Terrain[] $terrains
 */
class Projet extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
