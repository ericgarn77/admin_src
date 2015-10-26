<div id="frame-contenu" class="sameHeight">
    <!--[if !IE]>start section<![endif]-->
    <div class="section">
        <!--[if !IE]>start title wrapper<![endif]-->
        <div class="title_wrapper">
            <div class="title_wrapper_inner">
                <div class="title_wrapper_content">
                    <h2><?php echo $data['title'].' du '.$projet->nom; ?></h2>
                </div>
            </div>    
        </div>
        <!--[if !IE]>end title wrapper<![endif]-->
        <!--[if !IE]>start section content<![endif]-->
        <div class="section_content">
            <div class="section_content_inner">
                <ul id="menuTable">
                    <?= $this->Form->create('', ['action' => 'edit', 'name' => 'formAdd', 'id' => 'formAdd']) ?>
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
                                    <div class="inputs">
                                        <span class="input_wrapper">
                                            <?php if($galeries)
                                            {
                                                foreach ($galeries as $galerie): ?>
                                                <div class="wrap-dropfile">
                                                    <div class="dropfile galerie" data-name-value="<?= $galerie->nom ?>">
                                                        <?= $this->Form->input('galeries[]', ['label' => false, 'type' => 'hidden', 'class' => 'text', 'id' => false, 'value' => $galerie->projet_id.'-'.$galerie->nom.'-'.$galerie->order_image]); ?>
                                                        <?= $this->Html->image('Admin.projets/'.$projet->dossier_image.'/'.$galerie->nom, [ "alt" => $galerie->nom]); ?>
                                                        <span class="remove"></span>
                                                    </div>
                                                    <span class="nom_image"><?= $galerie->nom ?></span>
                                                </div>
                                                <?php endforeach; ?>
                                                <div class="wrap-dropfile">
                                                    <div class="dropfile galerie">
                                                        <?= $this->Form->input('galeries[]', ['label' => false, 'type' => 'hidden', 'class' => 'text', 'id' => false]); ?>
                                                        <span class="remove"></span>
                                                    </div>
                                                    <span class="nom_image"></span>
                                                </div>
                                            <?php 
                                            }
                                            else
                                            { 
                                            ?>
                                                <div class="wrap-dropfile">
                                                    <div class="dropfile galerie">
                                                        <?= $this->Form->input('galeries[]', ['label' => false, 'type' => 'hidden', 'class' => 'text', 'id' => false]); ?>
                                                        <span class="remove"></span>
                                                    </div>
                                                    <span class="nom_image"></span>
                                                </div>

                                            <?php
                                            }
                                            ?>
                                            
                                            
                                        </span>
                                    </div>
                                </div>
                                
                                
                            </div>
                            <!--[if !IE]>end forms<![endif]-->
                        </fieldset>
                        <!--[if !IE]>end fieldset<![endif]-->
                        <?= $this->Form->input('dossier_image', ['label' => false, 'type' => 'hidden', 'class' => 'text', 'id' => 'dossier_image', 'value' => $projet->dossier_image]); ?>
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



