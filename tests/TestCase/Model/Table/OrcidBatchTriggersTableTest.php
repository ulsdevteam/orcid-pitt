<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrcidBatchTriggersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrcidBatchTriggersTable Test Case
 */
class OrcidBatchTriggersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OrcidBatchTriggersTable
     */
    public $OrcidBatchTriggers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.OrcidBatchTriggers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('OrcidBatchTriggers') ? [] : ['className' => OrcidBatchTriggersTable::class];
        $this->OrcidBatchTriggers = TableRegistry::getTableLocator()->get('OrcidBatchTriggers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OrcidBatchTriggers);

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
