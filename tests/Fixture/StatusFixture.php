<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StatusFixture
 */
class StatusFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'status';
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
                'name' => 'Lorem ipsum dolor ',
            ],
        ];
        parent::init();
    }
}
