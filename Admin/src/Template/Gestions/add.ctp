<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Gestions'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="gestions form large-10 medium-9 columns">
    <?= $this->Form->create($gestion) ?>
    <fieldset>
        <legend><?= __('Add Gestion') ?></legend>
        <?php
            echo $this->Form->input('action');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>