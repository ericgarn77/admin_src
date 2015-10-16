<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Region'), ['action' => 'edit', $region->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Region'), ['action' => 'delete', $region->id], ['confirm' => __('Are you sure you want to delete # {0}?', $region->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Regions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Region'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projets'), ['controller' => 'Projets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projet'), ['controller' => 'Projets', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Terrains'), ['controller' => 'Terrains', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Terrain'), ['controller' => 'Terrains', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="regions view large-10 medium-9 columns">
    <h2><?= h($region->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Nom') ?></h6>
            <p><?= h($region->nom) ?></p>
            <h6 class="subheader"><?= __('Terrain') ?></h6>
            <p><?= h($region->terrain) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($region->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($region->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($region->modified) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Projets') ?></h4>
    <?php if (!empty($region->projets)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Region Id') ?></th>
            <th><?= __('Nom') ?></th>
            <th><?= __('Description') ?></th>
            <th><?= __('Statut') ?></th>
            <th><?= __('Url Map') ?></th>
            <th><?= __('Url Plan') ?></th>
            <th><?= __('Image') ?></th>
            <th><?= __('Presentation') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($region->projets as $projets): ?>
        <tr>
            <td><?= h($projets->id) ?></td>
            <td><?= h($projets->region_id) ?></td>
            <td><?= h($projets->nom) ?></td>
            <td><?= h($projets->description) ?></td>
            <td><?= h($projets->statut) ?></td>
            <td><?= h($projets->url_map) ?></td>
            <td><?= h($projets->url_plan) ?></td>
            <td><?= h($projets->image) ?></td>
            <td><?= h($projets->presentation) ?></td>
            <td><?= h($projets->created) ?></td>
            <td><?= h($projets->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Projets', 'action' => 'view', $projets->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Projets', 'action' => 'edit', $projets->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Projets', 'action' => 'delete', $projets->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projets->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Terrains') ?></h4>
    <?php if (!empty($region->terrains)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Projet Id') ?></th>
            <th><?= __('Region Id') ?></th>
            <th><?= __('Lot') ?></th>
            <th><?= __('Superficie') ?></th>
            <th><?= __('Rue') ?></th>
            <th><?= __('Statut') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($region->terrains as $terrains): ?>
        <tr>
            <td><?= h($terrains->id) ?></td>
            <td><?= h($terrains->projet_id) ?></td>
            <td><?= h($terrains->region_id) ?></td>
            <td><?= h($terrains->lot) ?></td>
            <td><?= h($terrains->superficie) ?></td>
            <td><?= h($terrains->rue) ?></td>
            <td><?= h($terrains->statut) ?></td>
            <td><?= h($terrains->created) ?></td>
            <td><?= h($terrains->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Terrains', 'action' => 'view', $terrains->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Terrains', 'action' => 'edit', $terrains->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Terrains', 'action' => 'delete', $terrains->id], ['confirm' => __('Are you sure you want to delete # {0}?', $terrains->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
