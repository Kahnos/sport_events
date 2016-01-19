<?php
namespace App\Test\TestCase\Controller;

use App\Controller\IndividualParticipationsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\IndividualParticipationsController Test Case
 */
class IndividualParticipationsControllerTest extends IntegrationTestCase
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
