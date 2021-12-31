<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Machine $machine
 * @var \Cake\Collection\CollectionInterface|string[] $status
 * @var \Cake\Collection\CollectionInterface|string[] $brand
 * @var \Cake\Collection\CollectionInterface|string[] $model
 * @var \Cake\Collection\CollectionInterface|string[] $operativeSystem
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Machine'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="machine form content">
            <?= $this->Form->create($machine) ?>
            <fieldset>
                <legend><?= __('Add Machine') ?></legend>
                <?php
                    echo $this->Form->control('serial_number');
                    echo $this->Form->control('status_id', ['options' => $status]);
                    echo $this->Form->control('brand_id', ['options' => $brand]);
                    echo $this->Form->control('model_id', ['options' => $model]);
                    echo $this->Form->control('operative_system_id', ['options' => $operativeSystem]);
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
        $("#model-id").attr("disabled","disabled");
        $("#brand-id").change(function(){
            $("#model-id").attr("disabled","disabled");
            $("#model-id").html("<option>Please wait...</option>");
            var id = $("#brand-id option:selected").attr('value');
            
            $.get("/machine/populatemodel", {brand_id:id}, function(data){
                $("#model-id").html("");
                $("#model-id").html("<option selected>Choose...</option>");
                $("#model-id").removeAttr("disabled");
                
                for (const val of data) {
                    $('#model-id').append($(document.createElement('option')).prop({
                        value: val.id,
                        text: val.name
                    }));
                } 
            });
        });
        
    });
</script>