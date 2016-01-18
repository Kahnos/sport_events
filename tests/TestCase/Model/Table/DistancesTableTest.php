<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DistancesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DistancesTable Test Case
 */
class DistancesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.distances',
        'app.categories',
        'app.ages',
        'app.individual_participations',
        'app.team_participations',
        'app.teams',
        'app.clubs',
        'app.athletes',
        'app.athletes_teams',
        'app.winners'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Distances') ? [] : ['className' => 'App\Model\Table\DistancesTable'];
        $this->Distances = TableRegistry::get('Distances', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Distances);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
