<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Machine[]|\Cake\Collection\CollectionInterface $machine
 */
    $total_machine = count($machine);
?>
<div class="machine index content">
    <?= $this->Html->link(__('New Machine'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <?= $this->Html->link(__('Active Machine'), ['action' => 'machines'], ['class' => 'button float-right mx-3']) ?>
    <h3><?= __('Machine') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('serial_number') ?></th>
                    <th><?= $this->Paginator->sort('status_id') ?></th>
                    <th><?= $this->Paginator->sort('brand_id') ?></th>
                    <th><?= $this->Paginator->sort('model_id') ?></th>
                    <th><?= $this->Paginator->sort('operative_system_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($machine as $machine): ?>
                <tr>
                    <td><?= $this->Number->format($machine->id) ?></td>
                    <td><?= h($machine->serial_number) ?></td>
                    <td><?= $machine->has('status') ? $this->Html->link($machine->status->name, ['controller' => 'Status', 'action' => 'view', $machine->status->id]) : '' ?></td>
                    <td><?= $machine->has('brand') ? $this->Html->link($machine->brand->name, ['controller' => 'Brand', 'action' => 'view', $machine->brand->id]) : '' ?></td>
                    <td><?= $machine->has('model') ? $this->Html->link($machine->model->name, ['controller' => 'Model', 'action' => 'view', $machine->model->id]) : '' ?></td>
                    <td><?= $machine->has('operative_system') ? $this->Html->link($machine->operative_system->name, ['controller' => 'OperativeSystem', 'action' => 'view', $machine->operative_system->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $machine->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $machine->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $machine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $machine->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
