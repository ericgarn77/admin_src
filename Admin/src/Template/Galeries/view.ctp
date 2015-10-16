<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Galery'), ['action' => 'edit', $galery->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Galery'), ['action' => 'delete', $galery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $galery->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Galeries'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Galery'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projets'), ['controller' => 'Projets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projet'), ['controller' => 'Projets', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="galeries view large-10 medium-9 columns">
    <h2><?= h($galery->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Projet') ?></h6>
            <p><?= $galery->has('projet') ? $this->Html->link($galery->projet->id, ['controller' => 'Projets', 'action' => 'view', $galery->projet->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Nom') ?></h6>
            <p><?= h($galery->nom) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($galery->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($galery->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($galery->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Url') ?></h6>
            <?= $this->Text->autoParagraph(h($galery->url)) ?>
        </div>
    </div>
</div>
