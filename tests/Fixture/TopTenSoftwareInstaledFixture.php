<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TopTenSoftwareInstaledFixture
 */
class TopTenSoftwareInstaledFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'top_ten_software_instaled';
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
                'SoftCount' => 1,
            ],
        ];
        parent::init();
    }
}
