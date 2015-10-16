<?php
namespace Admin\Model\Table;

use Admin\Model\Entity\Terrain;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Terrains Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Projets
 * @property \Cake\ORM\Association\BelongsTo $Regions
 */
class TerrainsTable extends Table
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

        $this->table('terrains');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Projets', [
            'foreignKey' => 'projet_id',
            'joinType' => 'INNER',
            'className' => 'Admin.Projets'
        ]);
        $this->belongsTo('Regions', [
            'foreignKey' => 'region_id',
            'className' => 'Admin.Regions'
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
            ->allowEmpty('lot');

        $validator
            ->allowEmpty('superficie');

        $validator
            ->allowEmpty('rue');

        $validator
            ->allowEmpty('statut');

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
        $rules->add($rules->existsIn(['projet_id'], 'Projets'));
        $rules->add($rules->existsIn(['region_id'], 'Regions'));
        return $rules;
    }
}
