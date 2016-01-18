<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Mode Entity.
 *
 * @property int $id
 * @property string $type
 * @property int $number_of_disciplines
 * @property \App\Model\Entity\IndividualParticipation[] $individual_participations
 * @property \App\Model\Entity\TeamParticipation[] $team_participations
 * @property \App\Model\Entity\Winner[] $winners
 * @property \App\Model\Entity\Discipline[] $disciplines
 */
class Mode extends Entity
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
