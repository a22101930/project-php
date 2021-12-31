<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GestaoSoft Entity
 *
 * @property int $id
 * @property int $machine_id
 * @property int $software_id
 * @property int $soft_version_id
 *
 * @property \App\Model\Entity\Machine $machine
 * @property \App\Model\Entity\Software $software
 * @property \App\Model\Entity\SoftVersion $soft_version
 */
class GestaoSoft extends Entity
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
        'machine_id' => true,
        'software_id' => true,
        'soft_version_id' => true,
        'machine' => true,
        'software' => true,
        'soft_version' => true,
    ];
}
