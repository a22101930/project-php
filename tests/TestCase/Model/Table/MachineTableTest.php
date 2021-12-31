<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MachineTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MachineTable Test Case
 */
class MachineTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MachineTable
     */
    protected $Machine;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Machine',
        'app.Status',
        'app.Brand',
        'app.Model',
        'app.OperativeSystem',
        'app.GestaoSoft',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Machine') ? [] : ['className' => MachineTable::class];
        $this->Machine = $this->getTableLocator()->get('Machine', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Machine);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MachineTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\MachineTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
