<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AthletesTeam Entity.
 *
 * @property int $athlete_id
 * @property \App\Model\Entity\Athlete $athlete
 * @property int $team_id
 * @property \App\Model\Entity\Team $team
 */
class AthletesTeam extends Entity
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
        'athlete_id' => false,
        'team_id' => false,
    ];
}
