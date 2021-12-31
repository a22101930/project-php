<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GestaoSoft[]|\Cake\Collection\CollectionInterface $gestaoSoft
 */
?>
<div class="gestaoSoft index content">
    <?= $this->Html->link(__('New Gestao Soft'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <?= $this->Html->link(__('Top 10 Soft'), ['action' => 'topten'], ['class' => 'button float-right mx-3 bg-success']) ?>
    <h3><?= __('Gestao Soft') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('software_id') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($gestaoSoft as $gestaoSoft): ?>
                <tr>
                    <td><?= $this->Number->format($gestaoSoft->software_id) ?></td>
                    <td><?= $gestaoSoft->has('software') ? $this->Html->link($gestaoSoft->software->name, ['controller' => 'Software', 'action' => 'view', $gestaoSoft->software->id]) : '' ?></td>
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
