<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OperativeSystem $operativeSystem
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $operativeSystem->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $operativeSystem->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Operative System'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="operativeSystem form content">
            <?= $this->Form->create($operativeSystem) ?>
            <fieldset>
                <legend><?= __('Edit Operative System') ?></legend>
                <?php
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
