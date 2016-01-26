<?php
namespace App\Model\Table;

use App\Model\Entity\Category;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Categories Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Ages
 * @property \Cake\ORM\Association\BelongsTo $Distances
 * @property \Cake\ORM\Association\HasMany $IndividualParticipations
 * @property \Cake\ORM\Association\HasMany $TeamParticipations
 * @property \Cake\ORM\Association\HasMany $Teams
 * @property \Cake\ORM\Association\HasMany $Winners
 */
class CategoriesTable extends Table
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

        $this->table('categories');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Ages', [
            'foreignKey' => 'age_id'
        ]);
        $this->belongsTo('Distances', [
            'foreignKey' => 'distance_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('IndividualParticipations', [
            'foreignKey' => 'category_id'
        ]);
        $this->hasMany('TeamParticipations', [
            'foreignKey' => 'category_id'
        ]);
        $this->hasMany('Teams', [
            'foreignKey' => 'category_id'
        ]);
        $this->hasMany('Winners', [
            'foreignKey' => 'category_id'
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
            ->requirePresence('sex', 'create')
            ->notEmpty('sex');

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
        $rules->add($rules->existsIn(['age_id'], 'Ages'));
        $rules->add($rules->existsIn(['distance_id'], 'Distances'));
        return $rules;
    }
}
