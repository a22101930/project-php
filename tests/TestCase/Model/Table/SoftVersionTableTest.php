<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SoftVersionTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SoftVersionTable Test Case
 */
class SoftVersionTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SoftVersionTable
     */
    protected $SoftVersion;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.SoftVersion',
        'app.Software',
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
        $config = $this->getTableLocator()->exists('SoftVersion') ? [] : ['className' => SoftVersionTable::class];
        $this->SoftVersion = $this->getTableLocator()->get('SoftVersion', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->SoftVersion);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SoftVersionTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\SoftVersionTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
