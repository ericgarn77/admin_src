<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Galery'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projets'), ['controller' => 'Projets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projet'), ['controller' => 'Projets', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="galeries index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('projet_id') ?></th>
            <th><?= $this->Paginator->sort('nom') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($galeries as $galery): ?>
        <tr>
            <td><?= $this->Number->format($galery->id) ?></td>
            <td>
                <?= $galery->has('projet') ? $this->Html->link($galery->projet->id, ['controller' => 'Projets', 'action' => 'view', $galery->projet->id]) : '' ?>
            </td>
            <td><?= h($galery->nom) ?></td>
            <td><?= h($galery->created) ?></td>
            <td><?= h($galery->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $galery->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $galery->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $galery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $galery->id)]) ?>
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
