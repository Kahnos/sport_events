<?php
namespace App\Model\Table;

use App\Model\Entity\Mode;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Modes Model
 *
 * @property \Cake\ORM\Association\HasMany $IndividualParticipations
 * @property \Cake\ORM\Association\HasMany $TeamParticipations
 * @property \Cake\ORM\Association\HasMany $Winners
 * @property \Cake\ORM\Association\BelongsToMany $Disciplines
 */
class ModesTable extends Table
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

        $this->table('modes');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('IndividualParticipations', [
            'foreignKey' => 'mode_id'
        ]);
        $this->hasMany('TeamParticipations', [
            'foreignKey' => 'mode_id'
        ]);
        $this->hasMany('Winners', [
            'foreignKey' => 'mode_id'
        ]);
        $this->belongsToMany('Disciplines', [
            'foreignKey' => 'mode_id',
            'targetForeignKey' => 'discipline_id',
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
            ->add('number_of_disciplines', 'valid', ['rule' => 'numeric'])
            ->requirePresence('number_of_disciplines', 'create')
            ->notEmpty('number_of_disciplines');

        return $validator;
    }
}
