<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CategoriesEventsModesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CategoriesEventsModesTable Test Case
 */
class CategoriesEventsModesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.categories_events_modes',
        'app.modes',
        'app.individual_participations',
        'app.athletes',
        'app.teams',
        'app.clubs',
        'app.categories',
        'app.ages',
        'app.distances',
        'app.team_participations',
        'app.events',
        'app.winners',
        'app.times',
        'app.athletes_teams',
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
        $config = TableRegistry::exists('CategoriesEventsModes') ? [] : ['className' => 'App\Model\Table\CategoriesEventsModesTable'];
        $this->CategoriesEventsModes = TableRegistry::get('CategoriesEventsModes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CategoriesEventsModes);

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
