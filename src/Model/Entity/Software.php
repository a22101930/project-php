<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Software Entity
 *
 * @property int $id
 * @property string $name
 *
 * @property \App\Model\Entity\GestaoSoft[] $gestao_soft
 * @property \App\Model\Entity\SoftVersion[] $soft_version
 */
class Software extends Entity
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
        'name' => true,
        'gestao_soft' => true,
        'soft_version' => true,
    ];
}
