<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrcidBatchCreatorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrcidBatchCreatorsTable Test Case
 */
class OrcidBatchCreatorsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OrcidBatchCreatorsTable
     */
    public $OrcidBatchCreators;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.OrcidBatchCreators'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('OrcidBatchCreators') ? [] : ['className' => OrcidBatchCreatorsTable::class];
        $this->OrcidBatchCreators = TableRegistry::getTableLocator()->get('OrcidBatchCreators', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OrcidBatchCreators);

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
