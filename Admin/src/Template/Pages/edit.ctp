<div id="contenu" class="sameHeight">
    <?= $this->Form->create($page, ['name' => 'formAdd', 'id' => 'formAdd']) ?>
    <!--[if !IE]>start section<![endif]-->
    <div class="section">
        <!--[if !IE]>start title wrapper<![endif]-->
        <div class="title_wrapper">
            <div class="title_wrapper_inner">
                <div class="title_wrapper_content">
                    <h2><?php echo $data['title']; ?></h2>
                </div>
            </div>    
        </div>
        <!--[if !IE]>end title wrapper<![endif]-->
        <!--[if !IE]>start section content<![endif]-->
        <div class="section_content">
            <div class="section_content_inner">
                <ul id="menuTable">
                    <li><?= $this->Form->button('Enregistrer', ['type' => 'submit', 'class' => 'save submit']) ?></li>
                    <li><?= $this->Html->link(__('Annuler'), ['action' => 'index'], ['confirm' => 'Voulez-vous vraiment annuler ?', 'class' => 'annuler']) ?></li>
                </ul>
                <!--[if !IE]>start forms<![endif]-->
                <div class="forms_wrapper">
                    <div class="search_form general_form">
                        <!--[if !IE]>start fieldset<![endif]-->
                        <fieldset>
                            <!--[if !IE]>start forms<![endif]-->
                            <div class="forms">
                                <div class="row">
                                    <label>Nom de la page</label>
                                    <div class="inputs">
                                        <span class="input_wrapper">
                                            <?= $this->Form->input('nom', ['label' => false, 'type' => 'text', 'id' => 'page_nom', 'class' => 'text']); ?>
                                        </span>
                                    </div>
                                </div>  
                                
                            </div>
                            <h3>Contenu   Html</h3>
                            <!--[if !IE]>end forms<![endif]-->
                            <?php if($contents) { ?>
                                <div class="forms html-content">
                                    <div class="delete_champ">Supprimer</div>
                                    <div class="ajouter_champ">Ajouter</div>
                                    <div class="wrap-row-contenu">
                                        <?php foreach ($contents as $content): ?>
                                        <div class="row contenu">
                                            <label><?= $content->contenu_nom ?></label>
                                            <div class="inputs">
                                                <div class="textarea_wrapper">
                                                    <?= $this->Form->input('contenu_nom[]', ['label' => false, 'type' => 'hidden', 'id' => 'contenu_nom', 'class' => 'text', 'value' => $content->contenu_nom]) ?>
                                                    <?= $this->Form->textarea('contenu[]', ['label' => false, 'escape' => false, 'rows' => '10', 'cols' => '80', 'id' => 'contenu-html', 'value' => $content->contenu]) ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                      <?php } ?>

                        </fieldset>
                        <!--[if !IE]>end fieldset<![endif]-->
                        <?= $this->Form->input('page_id', ['label' => false, 'type' => 'hidden', 'id' => 'contenu_nom', 'class' => 'text', 'value' => $page->id]) ?>
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


