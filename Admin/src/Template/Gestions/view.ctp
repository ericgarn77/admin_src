<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Gestion'), ['action' => 'edit', $gestion->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Gestion'), ['action' => 'delete', $gestion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gestion->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Gestions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gestion'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="gestions view large-10 medium-9 columns">
    <h2><?= h($gestion->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Action') ?></h6>
            <p><?= h($gestion->action) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($gestion->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($gestion->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($gestion->modified) ?></p>
        </div>
    </div>
</div>
