<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Terrains'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Projets'), ['controller' => 'Projets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projet'), ['controller' => 'Projets', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Regions'), ['controller' => 'Regions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Region'), ['controller' => 'Regions', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="terrains form large-10 medium-9 columns">
    <?= $this->Form->create($terrain) ?>
    <fieldset>
        <legend><?= __('Add Terrain') ?></legend>
        <?php
            echo $this->Form->input('projet_id', ['options' => $projets]);
            echo $this->Form->input('region_id', ['options' => $regions, 'empty' => true]);
            echo $this->Form->input('lot');
            echo $this->Form->input('superficie');
            echo $this->Form->input('rue');
            echo $this->Form->input('statut');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
