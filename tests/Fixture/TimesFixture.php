<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TimesFixture
 *
 */
class TimesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'time_1' => ['type' => 'time', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'time_2' => ['type' => 'time', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'time_3' => ['type' => 'time', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'time_4' => ['type' => 'time', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'individual_participation_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'team_participation_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'time_total' => ['type' => 'time', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'IX_Relationship33' => ['type' => 'index', 'columns' => ['individual_participation_id'], 'length' => []],
            'IX_Relationship35' => ['type' => 'index', 'columns' => ['team_participation_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'Relationship33' => ['type' => 'foreign', 'columns' => ['individual_participation_id'], 'references' => ['individual_participations', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'Relationship35' => ['type' => 'foreign', 'columns' => ['team_participation_id'], 'references' => ['team_participations', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'time_1' => '01:39:35',
            'time_2' => '01:39:35',
            'time_3' => '01:39:35',
            'time_4' => '01:39:35',
            'id' => 1,
            'individual_participation_id' => 1,
            'team_participation_id' => 1,
            'time_total' => '01:39:35'
        ],
    ];
}
