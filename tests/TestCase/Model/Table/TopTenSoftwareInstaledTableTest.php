<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TopTenSoftwareInstaledTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TopTenSoftwareInstaledTable Test Case
 */
class TopTenSoftwareInstaledTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TopTenSoftwareInstaledTable
     */
    protected $TopTenSoftwareInstaled;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TopTenSoftwareInstaled',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TopTenSoftwareInstaled') ? [] : ['className' => TopTenSoftwareInstaledTable::class];
        $this->TopTenSoftwareInstaled = $this->getTableLocator()->get('TopTenSoftwareInstaled', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TopTenSoftwareInstaled);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TopTenSoftwareInstaledTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
