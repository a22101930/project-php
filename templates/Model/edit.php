<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Model $model
 * @var string[]|\Cake\Collection\CollectionInterface $brand
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $model->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $model->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Model'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="model form content">
            <?= $this->Form->create($model) ?>
            <fieldset>
                <legend><?= __('Edit Model') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('brand_id', ['options' => $brand]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
