<?php
namespace App\Test\TestCase\Controller;

use App\Controller\AthletesTeamsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\AthletesTeamsController Test Case
 */
class AthletesTeamsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.athletes_teams',
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
        'app.events',
        'app.times',
        'app.disciplines',
        'app.disciplines_modes'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
