<?php
namespace App\Model\Table;

use App\Model\Entity\Time;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Times Model
 *
 * @property \Cake\ORM\Association\BelongsTo $IndividualParticipations
 * @property \Cake\ORM\Association\BelongsTo $TeamParticipations
 */
class TimesTable extends Table
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

        $this->table('times');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('IndividualParticipations', [
            'foreignKey' => 'individual_participation_id'
        ]);
        $this->belongsTo('TeamParticipations', [
            'foreignKey' => 'team_participation_id'
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
            ->add('time_1', 'valid', ['rule' => 'time'])
            ->allowEmpty('time_1');

        $validator
            ->add('time_2', 'valid', ['rule' => 'time'])
            ->allowEmpty('time_2');

        $validator
            ->add('time_3', 'valid', ['rule' => 'time'])
            ->allowEmpty('time_3');

        $validator
            ->add('time_4', 'valid', ['rule' => 'time'])
            ->allowEmpty('time_4');

        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->add('time_total', 'valid', ['rule' => 'time'])
            ->allowEmpty('time_total');

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
        $rules->add($rules->existsIn(['individual_participation_id'], 'IndividualParticipations'));
        $rules->add($rules->existsIn(['team_participation_id'], 'TeamParticipations'));
        return $rules;
    }
}
