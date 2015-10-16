<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Terrain'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projets'), ['controller' => 'Projets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projet'), ['controller' => 'Projets', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Regions'), ['controller' => 'Regions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Region'), ['controller' => 'Regions', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="terrains index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('projet_id') ?></th>
            <th><?= $this->Paginator->sort('region_id') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($terrains as $terrain): ?>
        <tr>
            <td><?= $this->Number->format($terrain->id) ?></td>
            <td>
                <?= $terrain->has('projet') ? $this->Html->link($terrain->projet->id, ['controller' => 'Projets', 'action' => 'view', $terrain->projet->id]) : '' ?>
            </td>
            <td>
                <?= $terrain->has('region') ? $this->Html->link($terrain->region->id, ['controller' => 'Regions', 'action' => 'view', $terrain->region->id]) : '' ?>
            </td>
            <td><?= h($terrain->created) ?></td>
            <td><?= h($terrain->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $terrain->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $terrain->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $terrain->id], ['confirm' => __('Are you sure you want to delete # {0}?', $terrain->id)]) ?>
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
