<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Software $software
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Software'), ['action' => 'edit', $software->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Software'), ['action' => 'delete', $software->id], ['confirm' => __('Are you sure you want to delete # {0}?', $software->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Software'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Software'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="software view content">
            <h3><?= h($software->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($software->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($software->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Gestao Soft') ?></h4>
                <?php if (!empty($software->gestao_soft)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Machine Id') ?></th>
                            <th><?= __('Software Id') ?></th>
                            <th><?= __('Soft Version Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($software->gestao_soft as $gestaoSoft) : ?>
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
            <div class="related">
                <h4><?= __('Related Soft Version') ?></h4>
                <?php if (!empty($software->soft_version)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Version') ?></th>
                            <th><?= __('Software Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($software->soft_version as $softVersion) : ?>
                        <tr>
                            <td><?= h($softVersion->id) ?></td>
                            <td><?= h($softVersion->version) ?></td>
                            <td><?= h($softVersion->software_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'SoftVersion', 'action' => 'view', $softVersion->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'SoftVersion', 'action' => 'edit', $softVersion->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'SoftVersion', 'action' => 'delete', $softVersion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $softVersion->id)]) ?>
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
