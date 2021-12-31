<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OperativeSystem[]|\Cake\Collection\CollectionInterface $operativeSystem
 */
?>
<div class="operativeSystem index content">
    <?= $this->Html->link(__('New Operative System'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Operative System') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($operativeSystem as $operativeSystem): ?>
                <tr>
                    <td><?= $this->Number->format($operativeSystem->id) ?></td>
                    <td><?= h($operativeSystem->name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $operativeSystem->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $operativeSystem->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $operativeSystem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $operativeSystem->id)]) ?>
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
