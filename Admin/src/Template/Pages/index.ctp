<div id="contenu"  class="sameHeight">
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
                    <?= $this->Form->create(null, ['controller' => 'Pages', 'action' => 'deleteSelected', 'name' => 'formDel', 'id' => 'formDel']) ?>
                    <li><?= $this->Html->link(__('Ajouter'), ['controller' => 'Pages', 'action' => 'add'], ['class' => 'ajouter']) ?></li>
                    <li><?= $this->Form->button('Supprimer', ['type' => 'submit', 'class' => 'deleteselected submit']) ?></li>
                    
                </ul>
                <div class="table_wrapper">
                    <div class="table_wrapper_inner">
                            <ul>
                                <li id="identifiant" class="tableEntete"><?= $this->Paginator->sort('id') ?></li>
                                <li id="nomRegion" class="tableEntete"><?= $this->Paginator->sort('created') ?></li>
                                <li id="nomItem" class="tableEntete"><?= $this->Paginator->sort('nom') ?></li>
                                <li id="actions" class="tableEntete">Actions</li>
                            </ul>
                            <ul class="rows">
                                <?php foreach ($pages as $page): ?>
                                <?php $id_page = $this->Number->format($page->id); ?>
                                <li class="row">
                                    <span class="id-name">
                                        <div class="supCheckbox">
                                            <?= $this->Form->checkbox("checkbox[]", ["hiddenField" => false, "id" => "check-$id_page", "value" => $id_page]) ?>
                                            <label for="check-<?= $id_page ?>">&nbsp;</label>
                                            <?= $id_page ?>
                                        </div>
                                        <span class="enteteTerrain"><?= h($page->created) ?></span>
                                        <?= $this->Html->link($page->nom, ['action' => 'edit', $page->id]) ?>
                                    </span> 
                                    <div class="actions_menu">
                                        <ul>
                                            <li><?= $this->Html->link('', ['action' => 'edit', $page->id], ['class' => 'edit']) ?>
                                            </li>
                                            <li><?= $this->Html->link('', ['action' => 'delete', $page->id], ['confirm' => 'Voulez-vous vraiment supprimer cet page ?', $page->id, 'class' => 'delete']) ?>
                                            </li>
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
                <!--[if !IE]>end table_wrapper<![endif]-->
            </div>
        </div>
    </div>
</div>

