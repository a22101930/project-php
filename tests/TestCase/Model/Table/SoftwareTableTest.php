<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SoftwareTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SoftwareTable Test Case
 */
class SoftwareTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SoftwareTable
     */
    protected $Software;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Software',
        'app.GestaoSoft',
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
        $config = $this->getTableLocator()->exists('Software') ? [] : ['className' => SoftwareTable::class];
        $this->Software = $this->getTableLocator()->get('Software', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Software);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SoftwareTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
