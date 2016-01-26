<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DisciplinesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DisciplinesTable Test Case
 */
class DisciplinesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.disciplines',
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
        $config = TableRegistry::exists('Disciplines') ? [] : ['className' => 'App\Model\Table\DisciplinesTable'];
        $this->Disciplines = TableRegistry::get('Disciplines', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Disciplines);

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
