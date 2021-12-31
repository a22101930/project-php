<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Machine Entity
 *
 * @property int $id
 * @property string $serial_number
 * @property int $status_id
 * @property int $brand_id
 * @property int $model_id
 * @property int $operative_system_id
 *
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\Brand $brand
 * @property \App\Model\Entity\Model $model
 * @property \App\Model\Entity\OperativeSystem $operative_system
 * @property \App\Model\Entity\GestaoSoft[] $gestao_soft
 */
class Machine extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'serial_number' => true,
        'status_id' => true,
        'brand_id' => true,
        'model_id' => true,
        'operative_system_id' => true,
        'status' => true,
        'brand' => true,
        'model' => true,
        'operative_system' => true,
        'gestao_soft' => true,
    ];
}
