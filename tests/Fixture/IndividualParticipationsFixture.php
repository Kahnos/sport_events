<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * IndividualParticipationsFixture
 *
 */
class IndividualParticipationsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'position' => ['type' => 'integer', 'length' => 5, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'athlete_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'mode_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'category_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'event_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'IX_Relationship26' => ['type' => 'index', 'columns' => ['athlete_id'], 'length' => []],
            'IX_Relationship27' => ['type' => 'index', 'columns' => ['mode_id', 'category_id', 'event_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'composed_unique_2' => ['type' => 'unique', 'columns' => ['event_id', 'athlete_id', 'mode_id', 'category_id'], 'length' => []],
            'Relationship26' => ['type' => 'foreign', 'columns' => ['athlete_id'], 'references' => ['athletes', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'Relationship27' => ['type' => 'foreign', 'columns' => ['mode_id', 'category_id', 'event_id'], 'references' => ['categories_events_modes', '1' => ['mode_id', 'category_id', 'event_id']], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'position' => 1,
            'id' => 1,
            'athlete_id' => 1,
            'mode_id' => 1,
            'category_id' => 1,
            'event_id' => 1
        ],
    ];
}
