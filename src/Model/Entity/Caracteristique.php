<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Caracteristique Entity.
 *
 * @property int $id
 * @property int $projet_id
 * @property \App\Model\Entity\Projet $projet
 * @property string $nom
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Caracteristique extends Entity
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
