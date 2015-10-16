<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Contenu Html'), ['action' => 'edit', $contenuHtml->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Contenu Html'), ['action' => 'delete', $contenuHtml->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contenuHtml->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Contenu Html'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contenu Html'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pages'), ['controller' => 'Pages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Page'), ['controller' => 'Pages', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="contenuHtml view large-10 medium-9 columns">
    <h2><?= h($contenuHtml->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Nom') ?></h6>
            <p><?= h($contenuHtml->nom) ?></p>
            <h6 class="subheader"><?= __('Page') ?></h6>
            <p><?= $contenuHtml->has('page') ? $this->Html->link($contenuHtml->page->id, ['controller' => 'Pages', 'action' => 'view', $contenuHtml->page->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($contenuHtml->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($contenuHtml->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($contenuHtml->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Contenu') ?></h6>
            <?= $this->Text->autoParagraph(h($contenuHtml->contenu)) ?>
        </div>
    </div>
</div>
