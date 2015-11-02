<div id="frame-contenu" class="sameHeight">
    <!--[if !IE]>start section<![endif]-->
    <div class="section">
        <!--[if !IE]>start title wrapper<![endif]-->
        <div class="title_wrapper">
            <div class="title_wrapper_inner">
                <div class="title_wrapper_content">
                    <h2><?php echo $data['title'] ?></h2>
                </div>
            </div>    
        </div>
        <!--[if !IE]>end title wrapper<![endif]-->
        <!--[if !IE]>start section content<![endif]-->
        <div class="section_content">
            <div class="section_content_inner">
                <h3 class="flash"></h3>
                <ul id="menuTable">
                    <?= $this->Form->create($caracteristique, ['name' => 'formAdd', 'id' => 'formAdd']) ?>
                    <?= $this->Form->input('projet_id', ['label' => false, 'type' => 'hidden', 'class' => 'text', 'id' => 'projet_id', 'value' => $projet->id]) ?>
                    <li><?= $this->Form->button('Enregistrer', ['type' => 'submit', 'class' => 'save submit']) ?></li>
                    <li><?= $this->Html->link(__('Annuler'), ['action' => 'index', $projet->id], ['confirm' => 'Voulez-vous vraiment annuler ?', 'class' => 'annuler']) ?></li>
                </ul>
                <!--[if !IE]>start forms<![endif]-->
                <div class="forms_wrapper">
                    <div class="search_form general_form">
                        <!--[if !IE]>start fieldset<![endif]-->
                        <fieldset>
                            <!--[if !IE]>start forms<![endif]-->
                            <div class="forms">
                                
                                <div class="row">
                                    <label>Caractéristique</label>
                                    <div class="inputs">
                                        <span class="input_wrapper">
                                            <?= $this->Form->input('nom', ['label' => false, 'type' => 'text', 'id' => 'caracteristique_nom', 'class' => 'text']); ?>
                                        </span>
                                    </div>
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

