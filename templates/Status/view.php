<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Status $status
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Status'), ['action' => 'edit', $status->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Status'), ['action' => 'delete', $status->id], ['confirm' => __('Are you sure you want to delete # {0}?', $status->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Status'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Status'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="status view content">
            <h3><?= h($status->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($status->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($status->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Machine') ?></h4>
                <?php if (!empty($status->machine)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Serial Number') ?></th>
                            <th><?= __('Status Id') ?></th>
                            <th><?= __('Brand Id') ?></th>
                            <th><?= __('Model Id') ?></th>
                            <th><?= __('Operative System Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($status->machine as $machine) : ?>
                        <tr>
                            <td><?= h($machine->id) ?></td>
                            <td><?= h($machine->serial_number) ?></td>
                            <td><?= h($machine->status_id) ?></td>
                            <td><?= h($machine->brand_id) ?></td>
                            <td><?= h($machine->model_id) ?></td>
                            <td><?= h($machine->operative_system_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Machine', 'action' => 'view', $machine->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Machine', 'action' => 'edit', $machine->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Machine', 'action' => 'delete', $machine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $machine->id)]) ?>
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
