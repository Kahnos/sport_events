<?php
namespace App\Model\Table;

use App\Model\Entity\Age;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ages Model
 *
 * @property \Cake\ORM\Association\HasMany $Categories
 */
class AgesTable extends Table
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

        $this->table('ages');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Categories', [
            'foreignKey' => 'age_id'
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
            ->add('min_age', 'valid', ['rule' => 'numeric'])
            ->requirePresence('min_age', 'create')
            ->notEmpty('min_age');

        $validator
            ->add('max_age', 'valid', ['rule' => 'numeric'])
            ->requirePresence('max_age', 'create')
            ->notEmpty('max_age');

        $validator
            ->allowEmpty('name');

        return $validator;
    }
}
