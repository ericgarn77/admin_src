<?php 
    foreach($checkbox as $id)
    {
        echo $id;
    }



?>
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
                     <?= $this->Form->create(null, ['controller' => 'Regions', 'action' => 'deleteSelected', 'name' => 'formDel', 'id' => 'formDel']) ?>
                    <li><a href="#" class="ajouter">Ajouter</a></li>
                    <li><?= $this->Form->button('Supprimer', ['type' => 'submit', 'class' => 'deleteselected']) ?></li>
                    
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


