<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Pages'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Contenu Html'), ['controller' => 'ContenuHtml', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contenu Html'), ['controller' => 'ContenuHtml', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="pages form large-10 medium-9 columns">
    <?= $this->Form->create($page) ?>
    <fieldset>
        <legend><?= __('Add Page') ?></legend>
        <?php
            echo $this->Form->input('nom');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
