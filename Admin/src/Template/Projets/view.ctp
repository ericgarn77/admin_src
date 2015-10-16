<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Projet'), ['action' => 'edit', $projet->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Projet'), ['action' => 'delete', $projet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projet->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Projets'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projet'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Regions'), ['controller' => 'Regions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Region'), ['controller' => 'Regions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Caracteristiques'), ['controller' => 'Caracteristiques', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Caracteristique'), ['controller' => 'Caracteristiques', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Galeries'), ['controller' => 'Galeries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Galery'), ['controller' => 'Galeries', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Terrains'), ['controller' => 'Terrains', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Terrain'), ['controller' => 'Terrains', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="projets view large-10 medium-9 columns">
    <h2><?= h($projet->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Region') ?></h6>
            <p><?= $projet->has('region') ? $this->Html->link($projet->region->id, ['controller' => 'Regions', 'action' => 'view', $projet->region->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Nom') ?></h6>
            <p><?= h($projet->nom) ?></p>
            <h6 class="subheader"><?= __('Presentation') ?></h6>
            <p><?= h($projet->presentation) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($projet->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($projet->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($projet->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Description') ?></h6>
            <?= $this->Text->autoParagraph(h($projet->description)) ?>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Statut') ?></h6>
            <?= $this->Text->autoParagraph(h($projet->statut)) ?>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Url Map') ?></h6>
            <?= $this->Text->autoParagraph(h($projet->url_map)) ?>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Url Plan') ?></h6>
            <?= $this->Text->autoParagraph(h($projet->url_plan)) ?>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Image') ?></h6>
            <?= $this->Text->autoParagraph(h($projet->image)) ?>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Caracteristiques') ?></h4>
    <?php if (!empty($projet->caracteristiques)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Projet Id') ?></th>
            <th><?= __('Nom') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($projet->caracteristiques as $caracteristiques): ?>
        <tr>
            <td><?= h($caracteristiques->id) ?></td>
            <td><?= h($caracteristiques->projet_id) ?></td>
            <td><?= h($caracteristiques->nom) ?></td>
            <td><?= h($caracteristiques->created) ?></td>
            <td><?= h($caracteristiques->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Caracteristiques', 'action' => 'view', $caracteristiques->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Caracteristiques', 'action' => 'edit', $caracteristiques->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Caracteristiques', 'action' => 'delete', $caracteristiques->id], ['confirm' => __('Are you sure you want to delete # {0}?', $caracteristiques->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Galeries') ?></h4>
    <?php if (!empty($projet->galeries)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Projet Id') ?></th>
            <th><?= __('Nom') ?></th>
            <th><?= __('Url') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($projet->galeries as $galeries): ?>
        <tr>
            <td><?= h($galeries->id) ?></td>
            <td><?= h($galeries->projet_id) ?></td>
            <td><?= h($galeries->nom) ?></td>
            <td><?= h($galeries->url) ?></td>
            <td><?= h($galeries->created) ?></td>
            <td><?= h($galeries->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Galeries', 'action' => 'view', $galeries->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Galeries', 'action' => 'edit', $galeries->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Galeries', 'action' => 'delete', $galeries->id], ['confirm' => __('Are you sure you want to delete # {0}?', $galeries->id)]) ?>

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
    <?php if (!empty($projet->terrains)): ?>
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
        <?php foreach ($projet->terrains as $terrains): ?>
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
