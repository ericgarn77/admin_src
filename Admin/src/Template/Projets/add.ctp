<div id="contenu" class="sameHeight">
    <?= $this->Form->create($projet, ['name' => 'formAdd', 'id' => 'formAdd']) ?>
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
                    <li><?= $this->Html->link(__('Annuler'), ['controller' => 'Projets', 'action' => 'index'], ['confirm' => 'Voulez-vous vraiment annuler ?', 'class' => 'annuler']) ?></li>
                </ul>
                <!--[if !IE]>start forms<![endif]-->
                <div class="forms_wrapper">
                    <div class="search_form general_form">
                        <!--[if !IE]>start fieldset<![endif]-->
                        <fieldset>
                            <!--[if !IE]>start forms<![endif]-->
                            <div class="forms">
                                <div class="row">
                                    <label>Région</label>
                                    <div class="inputs region">
                                        <span class="input_wrapper">
                                            <select name="select_region" class="info text" >
                                                <option value="" selected="selected">Choisir une région</option>
                                                <?php foreach ($regions as $region): ?>
                                                <option value="<?= h($region->id) ?>"><?= h($region->nom) ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?= $this->Form->input('region_id', ['label' => false, 'type' => 'hidden', 'id' => 'region_id']) ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Nom du projet</label>
                                    <div class="inputs">
                                        <span class="input_wrapper">
                                            <?= $this->Form->input('nom', ['label' => false, 'type' => 'text', 'id' => 'projet_nom', 'class' => 'text']) ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Adresse</label>
                                    <div class="inputs">
                                        <span class="input_wrapper">
                                            <?= $this->Form->input('adresse', ['label' => false, 'type' => 'text', 'id' => 'adresse', 'class' => 'text']) ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Ordre d'affichage</label>
                                    <div class="inputs">
                                        <span class="input_wrapper">
                                            <?= $this->Form->input('order_projet', ['label' => false, 'type' => 'number', 'id' => 'order_projet', 'class' => 'text']) ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Page présentation</label>
                                    <div class="inputs">
                                        <p class="field switch">
                                            <label class="cb-enable presentation selected"><span class="oui presentation">OUI</span></label>
                                            <label class="cb-disable presentation"><span class="non presentation">NON</span></label>
                                            <?= $this->Form->checkbox('checkbox-presentation', ["hiddenField" => false, "id" => "page-presentation", 'class' => 'checkbox']) ?>
                                            <?= $this->Form->input('presentation', ['label' => false, 'type' => 'hidden', 'id' => 'check-presentation', 'class' => 'text', 'value' => 'oui']) ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Page terrain</label>
                                    <div class="inputs">
                                        <p class="field switch">
                                            <label class="cb-enable terrain selected"><span class="oui terrain">OUI</span></label>
                                            <label class="cb-disable terrain"><span class="non terrain">NON</span></label>
                                            <?= $this->Form->checkbox('checkbox-terrain', ["hiddenField" => false, "id" => "page-terrain", 'class' => 'checkbox']) ?>
                                            <?= $this->Form->input('terrain', ['label' => false, 'type' => 'hidden', 'id' => 'check-terrain', 'class' => 'text', 'value' => 'oui']) ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Vendu</label>
                                    <div class="inputs">
                                        <p class="field switch">
                                            <label class="cb-enable vendu selected"><span class="oui vendu">OUI</span></label>
                                            <label class="cb-disable vendu"><span class="non vendu">NON</span></label>
                                            <?= $this->Form->checkbox('checkbox-vendu', ["hiddenField" => false, "id" => "vendu", 'class' => 'checkbox']) ?>
                                            <?= $this->Form->input('statut', ['label' => false, 'type' => 'hidden', 'id' => 'check-vendu', 'class' => 'text', 'value' => 'à vendre']) ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Projet vedette</label>
                                    <div class="inputs">
                                        <p class="field switch">
                                            <label class="cb-enable vedette selected"><span class="oui vedette">OUI</span></label>
                                            <label class="cb-disable vedette"><span class="non vedette">NON</span></label>
                                            <?= $this->Form->checkbox('checkbox-vedette', ["hiddenField" => false, "id" => "vedette", 'class' => 'checkbox']) ?>
                                            <?= $this->Form->input('vedette', ['label' => false, 'type' => 'hidden', 'id' => 'check-vedette', 'class' => 'text', 'value' => 'non']) ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Url de la carte google</label>
                                    <div class="inputs">
                                        <span class="input_wrapper">
                                            <?= $this->Form->input('url_map', ['label' => false, 'type' => 'text', 'id' => 'url_map', 'class' => 'text']) ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Plan PDF</label>
                                    <div class="inputs">
                                        <span class="input_wrapper">
                                            <div class="wrap-dropfile">
                                                <div class="dropfile pdf">
                                                <?= $this->Form->input('plan_pdf', ['label' => false, 'type' => 'hidden', 'id' => 'plan_pdf', 'class' => 'text']) ?>
                                                    <span class="remove"></span>
                                                </div>
                                                <p class="upload-name"></p>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Dosssier d'images</label>
                                    <div class="inputs dossier">
                                        <span class="input_wrapper">
                                            <select name="dossier" class="info text" >
                                                <option value="" selected="selected">Choisir un dossier d'image pour ce projet</option>
                                                <?php foreach ($data['folders'] as $folder): ?>
                                                <option value="<?= $folder ?>"><?= $folder ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?= $this->Form->input('dossier_image', ['label' => false, 'type' => 'hidden', 'id' => 'dossier_image', 'class' => 'text']) ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Photo principal</label>
                                    <div class="inputs">
                                        <span class="input_wrapper">
                                            <div class="wrap-dropfile">
                                                <div class="dropfile photo">
                                                    <?= $this->Form->input('image', ['label' => false, 'type' => 'hidden', 'id' => 'image', 'class' => 'text']) ?>
                                                    <span class="remove"></span>
                                                </div>
                                                <p class="upload-name"></p>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Description du projet</label>
                                    <div class="inputs">
                                        <?= $this->Form->textarea('description', ['label' => false, 'escape' => false, 'rows' => '10', 'cols' => '80', 'id' => 'description']) ?>
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
