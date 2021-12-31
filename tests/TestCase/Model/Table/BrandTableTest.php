<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BrandTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BrandTable Test Case
 */
class BrandTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BrandTable
     */
    protected $Brand;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Brand',
        'app.Machine',
        'app.Model',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Brand') ? [] : ['className' => BrandTable::class];
        $this->Brand = $this->getTableLocator()->get('Brand', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Brand);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\BrandTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
