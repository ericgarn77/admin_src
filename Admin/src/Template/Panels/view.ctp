<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Panel'), ['action' => 'edit', $panel->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Panel'), ['action' => 'delete', $panel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $panel->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Panels'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Panel'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="panels view large-10 medium-9 columns">
    <h2><?= h($panel->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Action') ?></h6>
            <p><?= h($panel->action) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($panel->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($panel->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($panel->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Description') ?></h6>
            <?= $this->Text->autoParagraph(h($panel->description)) ?>
        </div>
    </div>
</div>
