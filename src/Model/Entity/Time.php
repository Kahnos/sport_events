<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Time Entity.
 *
 * @property \Cake\I18n\Time $time_1
 * @property \Cake\I18n\Time $time_2
 * @property \Cake\I18n\Time $time_3
 * @property \Cake\I18n\Time $time_4
 * @property int $id
 * @property int $individual_participation_id
 * @property \App\Model\Entity\IndividualParticipation $individual_participation
 * @property int $team_participation_id
 * @property \App\Model\Entity\TeamParticipation $team_participation
 * @property \Cake\I18n\Time $time_total
 */
class Time extends Entity
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
        'id' => false,
    ];
}
