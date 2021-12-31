<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Brand $brand
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Brand'), ['action' => 'edit', $brand->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Brand'), ['action' => 'delete', $brand->id], ['confirm' => __('Are you sure you want to delete # {0}?', $brand->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Brand'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Brand'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="brand view content">
            <h3><?= h($brand->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($brand->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($brand->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Machine') ?></h4>
                <?php if (!empty($brand->machine)) : ?>
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
                        <?php foreach ($brand->machine as $machine) : ?>
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
            <div class="related">
                <h4><?= __('Related Model') ?></h4>
                <?php if (!empty($brand->model)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Brand Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($brand->model as $model) : ?>
                        <tr>
                            <td><?= h($model->id) ?></td>
                            <td><?= h($model->name) ?></td>
                            <td><?= h($model->brand_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Model', 'action' => 'view', $model->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Model', 'action' => 'edit', $model->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Model', 'action' => 'delete', $model->id], ['confirm' => __('Are you sure you want to delete # {0}?', $model->id)]) ?>
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
