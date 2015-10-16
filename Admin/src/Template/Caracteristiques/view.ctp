<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Caracteristique'), ['action' => 'edit', $caracteristique->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Caracteristique'), ['action' => 'delete', $caracteristique->id], ['confirm' => __('Are you sure you want to delete # {0}?', $caracteristique->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Caracteristiques'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Caracteristique'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projets'), ['controller' => 'Projets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projet'), ['controller' => 'Projets', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="caracteristiques view large-10 medium-9 columns">
    <h2><?= h($caracteristique->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Projet') ?></h6>
            <p><?= $caracteristique->has('projet') ? $this->Html->link($caracteristique->projet->id, ['controller' => 'Projets', 'action' => 'view', $caracteristique->projet->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Nom') ?></h6>
            <p><?= h($caracteristique->nom) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($caracteristique->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($caracteristique->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($caracteristique->modified) ?></p>
        </div>
    </div>
</div>
