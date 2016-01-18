<?php
namespace App\Model\Table;

use App\Model\Entity\Distance;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Distances Model
 *
 * @property \Cake\ORM\Association\HasMany $Categories
 */
class DistancesTable extends Table
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

        $this->table('distances');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Categories', [
            'foreignKey' => 'distance_id'
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
            ->add('distance_1', 'valid', ['rule' => 'numeric'])
            ->requirePresence('distance_1', 'create')
            ->notEmpty('distance_1');

        $validator
            ->add('distance_2', 'valid', ['rule' => 'numeric'])
            ->requirePresence('distance_2', 'create')
            ->notEmpty('distance_2');

        $validator
            ->add('distance_3', 'valid', ['rule' => 'numeric'])
            ->requirePresence('distance_3', 'create')
            ->notEmpty('distance_3');

        $validator
            ->add('distance_4', 'valid', ['rule' => 'numeric'])
            ->requirePresence('distance_4', 'create')
            ->notEmpty('distance_4');

        $validator
            ->allowEmpty('name');

        return $validator;
    }
}
