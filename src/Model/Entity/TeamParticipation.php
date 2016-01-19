<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TeamParticipation Entity.
 *
 * @property int $position
 * @property int $id
 * @property int $team_id
 * @property \App\Model\Entity\Team $team
 * @property int $mode_id
 * @property \App\Model\Entity\Mode $mode
 * @property int $category_id
 * @property \App\Model\Entity\Category $category
 * @property int $event_id
 * @property \App\Model\Entity\Event $event
 * @property \App\Model\Entity\Time[] $times
 */
class TeamParticipation extends Entity
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
