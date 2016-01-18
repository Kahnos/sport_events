<?php
namespace App\Model\Table;

use App\Model\Entity\Discipline;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Disciplines Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Modes
 */
class DisciplinesTable extends Table
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

        $this->table('disciplines');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsToMany('Modes', [
            'foreignKey' => 'discipline_id',
            'targetForeignKey' => 'mode_id',
            'joinTable' => 'disciplines_modes'
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
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->requirePresence('sub_type', 'create')
            ->notEmpty('sub_type');

        return $validator;
    }
}
