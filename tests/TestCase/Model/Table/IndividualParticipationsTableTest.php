<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IndividualParticipationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IndividualParticipationsTable Test Case
 */
class IndividualParticipationsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.individual_participations',
        'app.athletes',
        'app.teams',
        'app.clubs',
        'app.categories',
        'app.ages',
        'app.distances',
        'app.team_participations',
        'app.winners',
        'app.athletes_teams',
        'app.modes',
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
        $config = TableRegistry::exists('IndividualParticipations') ? [] : ['className' => 'App\Model\Table\IndividualParticipationsTable'];
        $this->IndividualParticipations = TableRegistry::get('IndividualParticipations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->IndividualParticipations);

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
