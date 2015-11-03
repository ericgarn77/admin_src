<div id="contenu"  class="sameHeight">
    <?= $this->Form->create(null, ['controller' => 'Regions', 'action' => 'deleteSelected', 'name' => 'formDel', 'id' => 'formDel']) ?>
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
                    <li><?= $this->Html->link(__('Ajouter'), ['controller' => 'Regions', 'action' => 'add'], ['class' => 'ajouter']) ?></li>
                    <li><?= $this->Form->button('Supprimer', ['type' => 'submit', 'class' => 'deleteselected submit']) ?></li>
                    
                </ul>
                <div class="table_wrapper">
                    <div class="table_wrapper_inner">
                            <ul>
                                <li id="identifiant" class="tableEntete"><?= $this->Paginator->sort('id') ?></li>
                                <li id="nomRegion" class="tableEntete"><?= $this->Paginator->sort('terrain') ?></li>
                                <li id="nomItem" class="tableEntete"><?= $this->Paginator->sort('nom') ?></li>
                                <li id="actions" class="tableEntete">Actions</li>
                            </ul>
                            <ul class="rows">
                                <?php foreach ($regions as $region): ?>
                                <?php $id_region = $this->Number->format($region->id); ?>
                                <li class="row">
                                    <span class="id-name">
                                        <div class="supCheckbox">
                                            <?= $this->Form->checkbox("checkbox[]", ["hiddenField" => false, "id" => "check-$id_region", "value" => $id_region]) ?>
                                            <label for="check-<?= $id_region ?>">&nbsp;</label>
                                            <?= $id_region ?>
                                        </div>
                                        <span class="enteteTerrain"><?= h($region->terrain) ?></span>
                                        <?= $this->Html->link($region->nom, ['action' => 'edit', $region->id]) ?>
                                    </span> 
                                    <div class="actions_menu">
                                        <ul>
                                            <li><?= $this->Html->link('', ['action' => 'edit', $region->id], ['class' => 'edit']) ?>
                                            </li>
                                            <li><?= $this->Html->link('', ['action' => 'delete', $region->id], ['confirm' => 'Voulez-vous vraiment supprimer cet région ?', $region->id, 'class' => 'delete']) ?>
                                            </li>
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


