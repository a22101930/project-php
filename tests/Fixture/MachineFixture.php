<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MachineFixture
 */
class MachineFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'machine';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'serial_number' => 'Lorem ipsum dolor ',
                'status_id' => 1,
                'brand_id' => 1,
                'model_id' => 1,
                'operative_system_id' => 1,
            ],
        ];
        parent::init();
    }
}
