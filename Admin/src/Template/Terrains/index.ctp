<div id="frame-contenu" class="sameHeight">
    <?= $this->Form->create(null, ['controller' => 'Terrains', 'action' => 'deleteSelected', 'name' => 'formDel', 'id' => 'formDel']) ?>
    <!--[if !IE]>start section<![endif]-->
    <div class="section">
        <!--[if !IE]>start title wrapper<![endif]-->
        <div class="title_wrapper">
            <div class="title_wrapper_inner">
                <div class="title_wrapper_content">
                    <h2><?php echo $data['title'].' du '.$projet->nom. ' ' .$region->nom ?></h2>
                </div>
            </div>    
        </div>
        <!--[if !IE]>end title wrapper<![endif]-->
        <!--[if !IE]>start section content<![endif]-->
        <div class="section_content">
            <div class="section_content_inner">
                <h3 class="flash"><?= $this->Flash->render() ?></h3>
                <ul id="menuTable">
                    <?= $this->Form->input('projet_id', ['label' => false, 'type' => 'hidden', 'class' => 'text', 'id' => 'projet_id', 'value' => $projet->id]) ?>
                    <li><?= $this->Html->link(__('Ajouter'), ['controller' => 'Terrains', 'action' => 'add', $projet->id], ['class' => 'ajouter']) ?></li>
                    <li><?= $this->Form->button('Supprimer', ['type' => 'submit', 'class' => 'deleteselected submit']) ?></li>
                </ul>
                <div class="table_wrapper">
                    <div class="table_wrapper_inner">
                            <ul>
                                <li id="identifiant" class="tableEntete"><?= $this->Paginator->sort('id') ?></li>
                                <li id="lot" class="tableEntete"><?= $this->Paginator->sort('lot') ?></li>
                                <li id="superficie" class="tableEntete"><?= $this->Paginator->sort('superficie') ?></li>
                                <li id="statut" class="tableEntete"><?= $this->Paginator->sort('statut') ?></li>
                                <li id="actions" class="tableEntete">Actions</li>
                            </ul>
                            <ul class="rows">
                                <?php foreach ($terrains as $terrain): ?>
                                <?php $id = $this->Number->format($terrain->id); ?>
                                <li class="row">
                                    <span class="id-name">
                                        <div class="supCheckbox">
                                            <?= $this->Form->checkbox("checkbox[]", ["hiddenField" => false, "id" => "check-$id", "value" => $id]) ?>
                                            <label for="check-<?= $id ?>">&nbsp;</label>
                                            <?= $id ?>
                                        </div>

                                        <?= $this->Html->link($terrain->lot, ['action' => 'edit', $id], ['class' => 'terrainLot']) ?>
                                        <?= $this->Html->link($terrain->superficie, ['action' => 'edit', $id], ['class' => 'terrainSuperficie']) ?>
                                        <?= $this->Html->link($terrain->statut, ['action' => 'edit', $id], ['class' => 'terrainStatut']) ?>
                                    </span> 
                                    <div class="actions_menu">
                                        <ul>
                                            <li><?= $this->Html->link('', ['action' => 'edit', $id], ['class' => 'edit']) ?></li>
                                            
                                            <li><?= $this->Html->link('', ['action' => 'delete', $id], ['confirm' => 'Voulez-vous vraiment supprimer ce terrain ?','class' => 'delete']) ?></li>
                                        </ul>
                                    </div>
                                    <div style="clear:both"></div>
                                </li>
                                <?php endforeach; ?>
                            </ul>
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
                <!--[if !IE]>end table_wrapper<![endif]-->
            </div>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>

