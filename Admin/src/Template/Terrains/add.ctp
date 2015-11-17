<div id="frame-contenu" class="sameHeight">
    <?= $this->Form->create($terrain, ['name' => 'formAdd', 'id' => 'formAdd']) ?>
    <!--[if !IE]>start section<![endif]-->
    <div class="section">
        <!--[if !IE]>start title wrapper<![endif]-->
        <div class="title_wrapper">
            <div class="title_wrapper_inner">
                <div class="title_wrapper_content">
                    <h2><?php echo $data['title']. ' au ' .$projet->nom. ' ' .$region->nom ?></h2>
                </div>
            </div>    
        </div>
        <!--[if !IE]>end title wrapper<![endif]-->
        <!--[if !IE]>start section content<![endif]-->
        <div class="section_content">
            <div class="section_content_inner">
                <h3 class="flash"></h3>
                <ul id="menuTable">
                    <?= $this->Form->input('projet_id', ['label' => false, 'type' => 'hidden', 'class' => 'text', 'id' => 'projet_id', 'value' => $projet->id]) ?>
                    <?= $this->Form->input('region_id', ['label' => false, 'type' => 'hidden', 'class' => 'text', 'id' => 'region_id', 'value' => $region->id]) ?>
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
                                    <label>Vendu</label>
                                    <div class="inputs">
                                        <p class="field switch">
                                            <label class="cb-enable vendu selected"><span class="oui vendu">OUI</span></label>
                                            <label class="cb-disable vendu"><span class="non vendu">NON</span></label>
                                            <?= $this->Form->checkbox('checkbox-vendu', ["hiddenField" => false, "id" => "terrain", 'class' => 'checkbox']) ?>
                                            <?= $this->Form->input('statut', ['label' => false, 'type' => 'hidden', 'id' => 'check-vendu', 'class' => 'text']) ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Lot</label>
                                    <div class="inputs">
                                        <span class="input_wrapper">
                                            <?= $this->Form->input('lot', ['label' => false, 'type' => 'text', 'id' => 'terrain_lot', 'class' => 'text']); ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Superficie</label>
                                    <div class="inputs">
                                        <span class="input_wrapper">
                                            <?= $this->Form->input('superficie', ['label' => false, 'type' => 'text', 'id' => 'terrain_superficie', 'class' => 'text']); ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Rue</label>
                                    <div class="inputs">
                                        <span class="input_wrapper">
                                            <?= $this->Form->input('rue', ['label' => false, 'type' => 'text', 'id' => 'terrain_rue', 'class' => 'text']); ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Municipalité</label>
                                    <div class="inputs">
                                        <span class="input_wrapper">
                                            <?= $this->Form->input('municipalite', ['label' => false, 'type' => 'text', 'id' => 'terrain_municipalite', 'class' => 'text']); ?>
                                        </span>
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
    <!--[if !IE]>end section<![endif]-->
    <?= $this->Form->end() ?>
</div>

