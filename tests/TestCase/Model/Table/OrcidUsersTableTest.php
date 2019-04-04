<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrcidUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrcidUsersTable Test Case
 */
class OrcidUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OrcidUsersTable
     */
    public $OrcidUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.OrcidUsers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('OrcidUsers') ? [] : ['className' => OrcidUsersTable::class];
        $this->OrcidUsers = TableRegistry::getTableLocator()->get('OrcidUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OrcidUsers);

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
