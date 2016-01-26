<?php
namespace App\Model\Table;

use App\Model\Entity\AthletesTeam;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AthletesTeams Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Athletes
 * @property \Cake\ORM\Association\BelongsTo $Teams
 */
class AthletesTeamsTable extends Table
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

        $this->table('athletes_teams');
        $this->displayField('athlete_id');
        $this->primaryKey(['athlete_id', 'team_id']);

        $this->belongsTo('Athletes', [
            'foreignKey' => 'athlete_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Teams', [
            'foreignKey' => 'team_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['athlete_id'], 'Athletes'));
        $rules->add($rules->existsIn(['team_id'], 'Teams'));
        return $rules;
    }
}
