<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Caracteristique'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projets'), ['controller' => 'Projets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projet'), ['controller' => 'Projets', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="caracteristiques index large-10 medium-9 columns">
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
    <?php foreach ($caracteristiques as $caracteristique): ?>
        <tr>
            <td><?= $this->Number->format($caracteristique->id) ?></td>
            <td>
                <?= $caracteristique->has('projet') ? $this->Html->link($caracteristique->projet->id, ['controller' => 'Projets', 'action' => 'view', $caracteristique->projet->id]) : '' ?>
            </td>
            <td><?= h($caracteristique->nom) ?></td>
            <td><?= h($caracteristique->created) ?></td>
            <td><?= h($caracteristique->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $caracteristique->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $caracteristique->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $caracteristique->id], ['confirm' => __('Are you sure you want to delete # {0}?', $caracteristique->id)]) ?>
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
