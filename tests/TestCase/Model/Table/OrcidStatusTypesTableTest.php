<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrcidStatusTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrcidStatusTypesTable Test Case
 */
class OrcidStatusTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OrcidStatusTypesTable
     */
    public $OrcidStatusTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.OrcidStatusTypes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('OrcidStatusTypes') ? [] : ['className' => OrcidStatusTypesTable::class];
        $this->OrcidStatusTypes = TableRegistry::getTableLocator()->get('OrcidStatusTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OrcidStatusTypes);

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
