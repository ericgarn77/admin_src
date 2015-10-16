<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Caracteristiques'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Projets'), ['controller' => 'Projets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projet'), ['controller' => 'Projets', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="caracteristiques form large-10 medium-9 columns">
    <?= $this->Form->create($caracteristique) ?>
    <fieldset>
        <legend><?= __('Add Caracteristique') ?></legend>
        <?php
            echo $this->Form->input('projet_id', ['options' => $projets]);
            echo $this->Form->input('nom');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
