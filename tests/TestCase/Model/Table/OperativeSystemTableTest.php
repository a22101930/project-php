<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OperativeSystemTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OperativeSystemTable Test Case
 */
class OperativeSystemTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OperativeSystemTable
     */
    protected $OperativeSystem;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.OperativeSystem',
        'app.Machine',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('OperativeSystem') ? [] : ['className' => OperativeSystemTable::class];
        $this->OperativeSystem = $this->getTableLocator()->get('OperativeSystem', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->OperativeSystem);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\OperativeSystemTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
