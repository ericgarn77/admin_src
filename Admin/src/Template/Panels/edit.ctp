<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $panel->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $panel->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Panels'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="panels form large-10 medium-9 columns">
    <?= $this->Form->create($panel) ?>
    <fieldset>
        <legend><?= __('Edit Panel') ?></legend>
        <?php
            echo $this->Form->input('action');
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
