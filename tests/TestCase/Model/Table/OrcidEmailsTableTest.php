<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrcidEmailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrcidEmailsTable Test Case
 */
class OrcidEmailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OrcidEmailsTable
     */
    public $OrcidEmails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.OrcidEmails'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('OrcidEmails') ? [] : ['className' => OrcidEmailsTable::class];
        $this->OrcidEmails = TableRegistry::getTableLocator()->get('OrcidEmails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OrcidEmails);

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
