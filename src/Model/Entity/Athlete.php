<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Athlete Entity.
 *
 * @property int $id
 * @property string $name
 * @property string $sex
 * @property \Cake\I18n\Time $date_of_birth
 * @property int $CI
 * @property \App\Model\Entity\IndividualParticipation[] $individual_participations
 * @property \App\Model\Entity\Team[] $teams
 */
class Athlete extends Entity
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
