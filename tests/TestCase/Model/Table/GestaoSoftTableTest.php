<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GestaoSoftTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GestaoSoftTable Test Case
 */
class GestaoSoftTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GestaoSoftTable
     */
    protected $GestaoSoft;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.GestaoSoft',
        'app.Machine',
        'app.Software',
        'app.SoftVersion',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('GestaoSoft') ? [] : ['className' => GestaoSoftTable::class];
        $this->GestaoSoft = $this->getTableLocator()->get('GestaoSoft', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->GestaoSoft);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\GestaoSoftTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\GestaoSoftTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
