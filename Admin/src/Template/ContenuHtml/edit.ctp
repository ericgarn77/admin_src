<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $contenuHtml->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $contenuHtml->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Contenu Html'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pages'), ['controller' => 'Pages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Page'), ['controller' => 'Pages', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="contenuHtml form large-10 medium-9 columns">
    <?= $this->Form->create($contenuHtml) ?>
    <fieldset>
        <legend><?= __('Edit Contenu Html') ?></legend>
        <?php
            echo $this->Form->input('nom');
            echo $this->Form->input('contenu');
            echo $this->Form->input('page_id', ['options' => $pages]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
