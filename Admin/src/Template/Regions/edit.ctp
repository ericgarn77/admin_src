<div id="contenu" class="sameHeight">
    <?= $this->Form->create($region, ['name' => 'formAdd', 'id' => 'formAdd']) ?>
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
                                    <label>Nom de la région</label>
                                    <div class="inputs">
                                        <span class="input_wrapper">
                                            <?= $this->Form->input('nom', ['label' => false, 'type' => 'text', 'id' => 'region_nom', 'class' => 'text']); ?>
                                        </span>
                                    </div>
                                </div>  
                                <div class="row">
                                    <label>Page terrain</label>
                                    <div class="inputs">
                                        <p class="field switch">
                                            <label class="cb-enable terrain selected"><span class="oui terrain">OUI</span></label>
                                            <label class="cb-disable terrain"><span class="non terrain">NON</span></label>
                                            <?= $this->Form->checkbox('checkbox', ["hiddenField" => false, "id" => "page-terrain", 'class' => 'checkbox']) ?>
                                            <?= $this->Form->input('terrain', ['label' => false, 'type' => 'hidden', 'id' => 'check-terrain', 'class' => 'text']) ?>
                                        </p>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Option d'identification</label>
                                    <div class="inputs">
                                        <?= $this->Form->textarea('option', ['label' => false, 'type' => 'hidden', 'id' => 'dossier_image', 'class' => 'text']) ?>
                                    </div>
                                </div>
                            </div>
                            <!--[if !IE]>end forms<![endif]-->
                        </fieldset>
                        <!--[if !IE]>end fieldset<![endif]-->
                    </div>
                </div>
                <!--[if !IE]>end forms<![endif]-->
            </div>
        </div>
        <!--[if !IE]>end section content<![endif]-->
    </div>
    <?= $this->Form->end() ?>
    <!--[if !IE]>end section<![endif]-->
</div>

