<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TeamParticipationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TeamParticipationsTable Test Case
 */
class TeamParticipationsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.team_participations',
        'app.teams',
        'app.clubs',
        'app.categories',
        'app.ages',
        'app.distances',
        'app.individual_participations',
        'app.athletes',
        'app.athletes_teams',
        'app.modes',
        'app.winners',
        'app.disciplines',
        'app.disciplines_modes',
        'app.events',
        'app.times'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TeamParticipations') ? [] : ['className' => 'App\Model\Table\TeamParticipationsTable'];
        $this->TeamParticipations = TableRegistry::get('TeamParticipations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TeamParticipations);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
