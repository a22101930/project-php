<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Machine $machine
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Machine'), ['action' => 'edit', $machine->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Machine'), ['action' => 'delete', $machine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $machine->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Machine'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Machine'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="machine view content">
            <h3><?= h($machine->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Serial Number') ?></th>
                    <td><?= h($machine->serial_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $machine->has('status') ? $this->Html->link($machine->status->name, ['controller' => 'Status', 'action' => 'view', $machine->status->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Brand') ?></th>
                    <td><?= $machine->has('brand') ? $this->Html->link($machine->brand->name, ['controller' => 'Brand', 'action' => 'view', $machine->brand->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Model') ?></th>
                    <td><?= $machine->has('model') ? $this->Html->link($machine->model->name, ['controller' => 'Model', 'action' => 'view', $machine->model->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Operative System') ?></th>
                    <td><?= $machine->has('operative_system') ? $this->Html->link($machine->operative_system->name, ['controller' => 'OperativeSystem', 'action' => 'view', $machine->operative_system->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($machine->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Gestao Soft') ?></h4>
                <?php if (!empty($machine->gestao_soft)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Machine Id') ?></th>
                            <th><?= __('Software Id') ?></th>
                            <th><?= __('Soft Version Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($machine->gestao_soft as $gestaoSoft) : ?>
                        <tr>
                            <td><?= h($gestaoSoft->id) ?></td>
                            <td><?= h($gestaoSoft->machine_id) ?></td>
                            <td><?= h($gestaoSoft->software_id) ?></td>
                            <td><?= h($gestaoSoft->soft_version_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'GestaoSoft', 'action' => 'view', $gestaoSoft->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'GestaoSoft', 'action' => 'edit', $gestaoSoft->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'GestaoSoft', 'action' => 'delete', $gestaoSoft->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gestaoSoft->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
