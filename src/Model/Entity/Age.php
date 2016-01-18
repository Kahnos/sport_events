<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Age Entity.
 *
 * @property int $id
 * @property int $min_age
 * @property int $max_age
 * @property string $name
 * @property \App\Model\Entity\Category[] $categories
 */
class Age extends Entity
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
