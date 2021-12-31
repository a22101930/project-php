<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * GestaoSoftFixture
 */
class GestaoSoftFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'gestao_soft';
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
                'machine_id' => 1,
                'software_id' => 1,
                'soft_version_id' => 1,
            ],
        ];
        parent::init();
    }
}
