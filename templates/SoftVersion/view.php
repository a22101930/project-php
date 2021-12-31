<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SoftVersion $softVersion
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Soft Version'), ['action' => 'edit', $softVersion->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Soft Version'), ['action' => 'delete', $softVersion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $softVersion->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Soft Version'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Soft Version'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="softVersion view content">
            <h3><?= h($softVersion->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Version') ?></th>
                    <td><?= h($softVersion->version) ?></td>
                </tr>
                <tr>
                    <th><?= __('Software') ?></th>
                    <td><?= $softVersion->has('software') ? $this->Html->link($softVersion->software->name, ['controller' => 'Software', 'action' => 'view', $softVersion->software->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($softVersion->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Gestao Soft') ?></h4>
                <?php if (!empty($softVersion->gestao_soft)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Machine Id') ?></th>
                            <th><?= __('Software Id') ?></th>
                            <th><?= __('Soft Version Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($softVersion->gestao_soft as $gestaoSoft) : ?>
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
