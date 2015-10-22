<div id="frame-contenu" class="sameHeight">
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
                    <li><?= $this->Html->link(__('Modifier'), ['action' => 'edit'], ['class' => 'edit-2 colorboxiframedlarge']) ?></li>
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
                                            <div class="wrap-dropfile">
                                                <div class="dropfile photo">
                                                    <?= $this->Form->input('image', ['label' => false, 'type' => 'hidden', 'id' => 'image', 'class' => 'text']); ?>
                                                    <span class="remove"></span>
                                                </div>
                                            </div>
                                            <div class="wrap-dropfile">
                                                <div class="dropfile photo">
                                                    <?= $this->Form->input('image', ['label' => false, 'type' => 'hidden', 'id' => 'image', 'class' => 'text']); ?>
                                                    <span class="remove"></span>
                                                </div>
                                            </div>
                                            <div class="wrap-dropfile">
                                                <div class="dropfile photo">
                                                    <?= $this->Form->input('image', ['label' => false, 'type' => 'hidden', 'id' => 'image', 'class' => 'text']); ?>
                                                    <span class="remove"></span>
                                                </div>
                                            </div>
                                            <div class="wrap-dropfile">
                                                <div class="dropfile photo">
                                                    <?= $this->Form->input('image', ['label' => false, 'type' => 'hidden', 'id' => 'image', 'class' => 'text']); ?>
                                                    <span class="remove"></span>
                                                </div>
                                            </div>
                                            <div class="wrap-dropfile">
                                                <div class="dropfile photo">
                                                    <?= $this->Form->input('image', ['label' => false, 'type' => 'hidden', 'id' => 'image', 'class' => 'text']); ?>
                                                    <span class="remove"></span>
                                                </div>
                                            </div>
                                            <div class="wrap-dropfile">
                                                <div class="dropfile photo">
                                                    <?= $this->Form->input('image', ['label' => false, 'type' => 'hidden', 'id' => 'image', 'class' => 'text']); ?>
                                                    <span class="remove"></span>
                                                </div>
                                            </div>
                                            <div class="wrap-dropfile">
                                                <div class="dropfile photo">
                                                    <?= $this->Form->input('image', ['label' => false, 'type' => 'hidden', 'id' => 'image', 'class' => 'text']); ?>
                                                    <span class="remove"></span>
                                                </div>
                                            </div>
                                            <div class="wrap-dropfile">
                                                <div class="dropfile photo">
                                                    <?= $this->Form->input('image', ['label' => false, 'type' => 'hidden', 'id' => 'image', 'class' => 'text']); ?>
                                                    <span class="remove"></span>
                                                </div>
                                            </div>
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
</div>


