<?php
namespace App\Model\Table;

use App\Model\Entity\Projet;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Projets Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Regions
 * @property \Cake\ORM\Association\HasMany $Caracteristiques
 * @property \Cake\ORM\Association\HasMany $Galeries
 * @property \Cake\ORM\Association\HasMany $Terrains
 */
class ProjetsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('projets');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Regions', [
            'foreignKey' => 'region_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Caracteristiques', [
            'foreignKey' => 'projet_id'
        ]);
        $this->hasMany('Galeries', [
            'foreignKey' => 'projet_id'
        ]);
        $this->hasMany('Terrains', [
            'foreignKey' => 'projet_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('nom');

        $validator
            ->allowEmpty('description');

        $validator
            ->allowEmpty('statut');

        $validator
            ->allowEmpty('vedette');

        $validator
            ->allowEmpty('url_map');

        $validator
            ->allowEmpty('plan_pdf');

        $validator
            ->allowEmpty('dossier_image');

        $validator
            ->allowEmpty('image');

        $validator
            ->requirePresence('presentation', 'create')
            ->notEmpty('presentation');

        $validator
            ->requirePresence('terrain', 'create')
            ->notEmpty('terrain');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['region_id'], 'Regions'));
        return $rules;
    }
}