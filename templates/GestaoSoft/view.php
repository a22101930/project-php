<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GestaoSoft $gestaoSoft
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Gestao Soft'), ['action' => 'edit', $gestaoSoft->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Gestao Soft'), ['action' => 'delete', $gestaoSoft->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gestaoSoft->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Gestao Soft'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Gestao Soft'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="gestaoSoft view content">
            <h3><?= h($gestaoSoft->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Machine') ?></th>
                    <td><?= $gestaoSoft->has('machine') ? $this->Html->link($gestaoSoft->machine->serial_number, ['controller' => 'Machine', 'action' => 'view', $gestaoSoft->machine->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Software') ?></th>
                    <td><?= $gestaoSoft->has('software') ? $this->Html->link($gestaoSoft->software->name, ['controller' => 'Software', 'action' => 'view', $gestaoSoft->software->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Soft Version') ?></th>
                    <td><?= $gestaoSoft->has('soft_version') ? $this->Html->link($gestaoSoft->soft_version->id, ['controller' => 'SoftVersion', 'action' => 'view', $gestaoSoft->soft_version->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($gestaoSoft->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
