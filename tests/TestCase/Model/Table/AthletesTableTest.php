<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AthletesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AthletesTable Test Case
 */
class AthletesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.athletes',
        'app.individual_participations',
        'app.modes',
        'app.team_participations',
        'app.teams',
        'app.clubs',
        'app.categories',
        'app.ages',
        'app.distances',
        'app.winners',
        'app.athletes_teams',
        'app.events',
        'app.times',
        'app.disciplines',
        'app.disciplines_modes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Athletes') ? [] : ['className' => 'App\Model\Table\AthletesTable'];
        $this->Athletes = TableRegistry::get('Athletes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Athletes);

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
