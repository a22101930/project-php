<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SoftVersionFixture
 */
class SoftVersionFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'soft_version';
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
                'version' => 'Lorem ipsum dolor ',
                'software_id' => 1,
            ],
        ];
        parent::init();
    }
}
