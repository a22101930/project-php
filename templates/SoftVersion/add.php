<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SoftVersion $softVersion
 * @var \Cake\Collection\CollectionInterface|string[] $software
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Soft Version'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="softVersion form content">
            <?= $this->Form->create($softVersion) ?>
            <fieldset>
                <legend><?= __('Add Soft Version') ?></legend>
                <?php
                    echo $this->Form->control('version');
                    echo $this->Form->control('software_id', ['options' => $software]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
