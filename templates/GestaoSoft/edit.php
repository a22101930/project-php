<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GestaoSoft $gestaoSoft
 * @var string[]|\Cake\Collection\CollectionInterface $machine
 * @var string[]|\Cake\Collection\CollectionInterface $software
 * @var string[]|\Cake\Collection\CollectionInterface $softVersion
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $gestaoSoft->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $gestaoSoft->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Gestao Soft'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="gestaoSoft form content">
            <?= $this->Form->create($gestaoSoft) ?>
            <fieldset>
                <legend><?= __('Edit Gestao Soft') ?></legend>
                <?php
                    echo $this->Form->control('machine_id', ['options' => $machine]);
                    echo $this->Form->control('software_id', ['options' => $software]);
                    echo $this->Form->control('soft_version_id', ['options' => $softVersion]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script type="text/JavaScript">
    $(document).ready(function(){
        $("#soft-version-id").attr("disabled","disabled");
        $("#software-id").change(function(){
            
            $("#soft-version-id").attr("disabled","disabled");
            $("#soft-version-id").html("<option>Please wait...</option>");
            var id = $("#software-id option:selected").attr('value');
            
            $.get("/gestao-soft/populatesoftwareversion", {software_id:id}, function(data){
                $("#soft-version-id").html("");
                $("#soft-version-id").html("<option selected>Choose...</option>");
                $("#soft-version-id").removeAttr("disabled");
                
                for (const val of data) {
                    $('#soft-version-id').append($(document.createElement('option')).prop({
                        value: val.id,
                        text: val.version
                    }));
                } 
            });
        });
    });
</script>