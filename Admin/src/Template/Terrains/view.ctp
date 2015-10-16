<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Terrain'), ['action' => 'edit', $terrain->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Terrain'), ['action' => 'delete', $terrain->id], ['confirm' => __('Are you sure you want to delete # {0}?', $terrain->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Terrains'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Terrain'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projets'), ['controller' => 'Projets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projet'), ['controller' => 'Projets', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Regions'), ['controller' => 'Regions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Region'), ['controller' => 'Regions', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="terrains view large-10 medium-9 columns">
    <h2><?= h($terrain->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Projet') ?></h6>
            <p><?= $terrain->has('projet') ? $this->Html->link($terrain->projet->id, ['controller' => 'Projets', 'action' => 'view', $terrain->projet->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Region') ?></h6>
            <p><?= $terrain->has('region') ? $this->Html->link($terrain->region->id, ['controller' => 'Regions', 'action' => 'view', $terrain->region->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($terrain->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($terrain->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($terrain->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Lot') ?></h6>
            <?= $this->Text->autoParagraph(h($terrain->lot)) ?>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Superficie') ?></h6>
            <?= $this->Text->autoParagraph(h($terrain->superficie)) ?>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Rue') ?></h6>
            <?= $this->Text->autoParagraph(h($terrain->rue)) ?>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Statut') ?></h6>
            <?= $this->Text->autoParagraph(h($terrain->statut)) ?>
        </div>
    </div>
</div>
