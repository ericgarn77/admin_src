<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Contenu Html'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pages'), ['controller' => 'Pages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Page'), ['controller' => 'Pages', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="contenuHtml index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('nom') ?></th>
            <th><?= $this->Paginator->sort('page_id') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($contenuHtml as $contenuHtml): ?>
        <tr>
            <td><?= $this->Number->format($contenuHtml->id) ?></td>
            <td><?= h($contenuHtml->nom) ?></td>
            <td>
                <?= $contenuHtml->has('page') ? $this->Html->link($contenuHtml->page->id, ['controller' => 'Pages', 'action' => 'view', $contenuHtml->page->id]) : '' ?>
            </td>
            <td><?= h($contenuHtml->created) ?></td>
            <td><?= h($contenuHtml->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $contenuHtml->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contenuHtml->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contenuHtml->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contenuHtml->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
