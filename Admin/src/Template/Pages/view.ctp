<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Page'), ['action' => 'edit', $page->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Page'), ['action' => 'delete', $page->id], ['confirm' => __('Are you sure you want to delete # {0}?', $page->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Page'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Contenu Html'), ['controller' => 'ContenuHtml', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contenu Html'), ['controller' => 'ContenuHtml', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="pages view large-10 medium-9 columns">
    <h2><?= h($page->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Nom') ?></h6>
            <p><?= h($page->nom) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($page->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($page->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($page->modified) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Contenu Html') ?></h4>
    <?php if (!empty($page->contenu_html)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Nom') ?></th>
            <th><?= __('Contenu') ?></th>
            <th><?= __('Page Id') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($page->contenu_html as $contenuHtml): ?>
        <tr>
            <td><?= h($contenuHtml->id) ?></td>
            <td><?= h($contenuHtml->nom) ?></td>
            <td><?= h($contenuHtml->contenu) ?></td>
            <td><?= h($contenuHtml->page_id) ?></td>
            <td><?= h($contenuHtml->created) ?></td>
            <td><?= h($contenuHtml->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'ContenuHtml', 'action' => 'view', $contenuHtml->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'ContenuHtml', 'action' => 'edit', $contenuHtml->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ContenuHtml', 'action' => 'delete', $contenuHtml->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contenuHtml->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
