<div id="contenu"  class="sameHeight">
    <?= $this->Form->create(null, ['controller' => 'Projets', 'action' => 'deleteSelected', 'name' => 'formDel', 'id' => 'formDel']) ?>
    <div class="section">
        <div class="title_wrapper">
            <div class="title_wrapper_inner">
                <div class="title_wrapper_content">
                    <h2><?php echo $data['title']; ?></h2>
                </div>
            </div>
        </div>
        <div class="section_content">
            <div class="section_content_inner">
                <h3 class="flash"><?= $this->Flash->render() ?></h3>
                <ul id="menuTable">
                    <li><?= $this->Html->link(__('Ajouter'), ['controller' => 'Projets', 'action' => 'add'], ['class' => 'ajouter']) ?></li>
                    <li><?= $this->Form->button('Supprimer', ['type' => 'submit', 'class' => 'deleteselected submit']) ?></li>
                </ul>
                <div class="table_wrapper">
                    <div class="table_wrapper_inner">
                            <ul>
                                <li id="identifiant" class="tableEntete"><?= $this->Paginator->sort('id') ?></li>
                                <li id="nomRegion" class="tableEntete"><?= $this->Paginator->sort('region') ?></li>
                                <li id="nomItem" class="tableEntete"><?= $this->Paginator->sort('nom') ?></li>
                                <li id="actions" class="tableEntete">Actions</li>
                            </ul>
                            <ul class="rows">
                                <?php foreach ($projets as $projet): ?>
                                <?php $id = $this->Number->format($projet->id); ?>
                                <li class="row">
                                    <span class="id-name">
                                        <div class="supCheckbox">
                                            <?= $this->Form->checkbox("checkbox[]", ["hiddenField" => false, "id" => "check-$id", "value" => $id]) ?>
                                            <label for="check-<?= $id ?>">&nbsp;</label>
                                            <?= $id ?>
                                        </div>
                                        <span class="regionNom"><?= h($projet->region->nom) ?></span>
                                        <?= $this->Html->link($projet->nom, ['action' => 'edit', $projet->id]) ?>
                                    </span> 
                                    <div class="actions_menu">
                                        <ul>
                                            <li><?= $this->Html->link('', ['action' => 'edit', $projet->id], ['class' => 'edit']) ?></li>
                                            <li><?= $this->Html->link('', ['controller' => 'Galeries', 'action' => 'edit', $projet->id], ['title' => 'Galerie du projet', 'class' => 'images colorboxiframedlarge']) ?></li>
                                            <li><?= $this->Html->link('', ['controller' => 'Caracteristiques', 'action' => 'index', $projet->id], ['title' => 'Caracteristiques du projet', 'class' => 'pieces colorboxiframedlarge']) ?></li>
                                            <li><?= $this->Html->link('', ['controller' => 'Terrains', 'action' => 'index', $projet->id], ['title' => 'Terrains du projet', 'class' => 'terrains colorboxiframedlarge']) ?></li>
                                            <li><?= $this->Html->link('', ['action' => 'delete', $projet->id], ['confirm' => 'Voulez-vous vraiment supprimer ce projet ?','class' => 'delete']) ?></li>
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



