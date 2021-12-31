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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $software->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $software->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Software'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="software form content">
            <?= $this->Form->create($software) ?>
            <fieldset>
                <legend><?= __('Edit Software') ?></legend>
                <?php
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
