<div id="frame-contenu" class="sameHeight">
    <!--[if !IE]>start section<![endif]-->
    <div class="section">
        <!--[if !IE]>start title wrapper<![endif]-->
        <div class="title_wrapper">
            <div class="title_wrapper_inner">
                <div class="title_wrapper_content">
                    <h2><?php echo $data['title'].' du '.$projet->nom; ?></h2>
                </div>
            </div>    
        </div>
        <!--[if !IE]>end title wrapper<![endif]-->
        <!--[if !IE]>start section content<![endif]-->
        <div class="section_content">
            <div class="section_content_inner">
                <h3 class="flash"></h3>
                <ul id="menuTable">
                <?= $this->Form->create(null, ['action' => 'add', 'name' => 'formAdd', 'id' => 'formAdd']) ?>
                    <?= $this->Form->input('projet_id', ['label' => false, 'type' => 'hidden', 'class' => 'text', 'id' => 'projet_id', 'value' => $projet->id]) ?>
                    <li><?= $this->Form->button('Enregistrer', ['type' => 'submit', 'class' => 'save submit']) ?></li>
                    <li><?= $this->Html->link(__('Annuler'), ['controller' => 'Projets', 'action' => 'index'], ['confirm' => 'Voulez-vous vraiment annuler ?', 'class' => 'annuler']) ?></li>
                </ul>
                <div class="table_wrapper">
                    <div class="table_wrapper_inner">
                            <ul>
                                <li id="identifiant" class="tableEntete"><?= $this->Paginator->sort('id') ?></li>
                                <li id="nomcaracteristique" class="tableEntete"><?= $this->Paginator->sort('nom') ?></li>
                                <li id="actions" class="tableEntete">Actions</li>
                            </ul>
                            <ul class="rows">
                                <?php foreach ($caracteristiques as $caracteristique): ?>
                                <?php $id = $this->Number->format($caracteristique->id); ?>
                                <li class="row">
                                    <span class="id-name">
                                        <div class="supCheckbox">
                                            <?= $this->Form->checkbox("checkbox[]", ["hiddenField" => false, "id" => "check-$id", "value" => $id]) ?>
                                            <label for="check-<?= $id ?>">&nbsp;</label>
                                            <?= $id ?>
                                        </div>

                                        <?= $this->Html->link($caracteristique->nom, ['action' => 'edit', $id], ['class' => 'caractNom']) ?>
                                    </span> 
                                    <div class="actions_menu">
                                        <ul>
                                            <li><?= $this->Html->link('', ['action' => 'edit', $id], ['class' => 'edit']) ?></li>
                                            
                                            <li><?= $this->Html->link('', ['action' => 'delete', $id], ['confirm' => 'Voulez-vous vraiment supprimer ce projet ?','class' => 'delete']) ?></li>
                                        </ul>
                                    </div>
                                    <div style="clear:both"></div>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        <?= $this->Form->end() ?>
                    </div>
                    <?php if($rowcount > 10) {?>
                        <div class="wrap-paginator">
                            <div class="paginator">
                                <ul class="pagination">
                                    <?= $this->Paginator->prev('Précédent') ?>
                                    <span class="wrap-number-page">
                                        <?= $this->Paginator->numbers() ?>
                                    </span>
                                    <?= $this->Paginator->next('Suivant') ?>
                                </ul>
                                <p><?= $this->Paginator->counter() ?></p>
                            </div>
                        </div>
                    <?php }else{} ?>
                </div>
                                
                                
                                
                                
                            </div>
                            <!--[if !IE]>end forms<![endif]-->
                            </fieldset>
                        <!--[if !IE]>end fieldset<![endif]-->
                            
                        <?= $this->Form->end() ?>
                    </div>
                </div>
                <!--[if !IE]>end forms<![endif]-->
            </div>
        </div>
        <!--[if !IE]>end section content<![endif]-->
    </div>
    <!--[if !IE]>end section<![endif]-->
</div>














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
