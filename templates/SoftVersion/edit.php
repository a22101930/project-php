<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SoftVersion $softVersion
 * @var string[]|\Cake\Collection\CollectionInterface $software
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $softVersion->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $softVersion->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Soft Version'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="softVersion form content">
            <?= $this->Form->create($softVersion) ?>
            <fieldset>
                <legend><?= __('Edit Soft Version') ?></legend>
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
