<div class="content">
    <div class="content_left">
        <h3>Mes projets</h3>
    </div>
    <div class="content_right">
        <div class="btn_standard">
            <?= $this->Html->link('Retour aux Projets', ['controller' => 'Projets', 'action' => 'index']) ?>
            
        </div>
    </div>
    <div class="clear"></div>
</div>
<div class="content_navigation">
    <?= $this->Html->image('design/division_title_section.png', ['width' => '940', 'height' => '18', 'alt' => 'Division']) ?>
   
    <div class="clear"></div>
</div>
<div class="content_projets">
    <div class="projet_left">
    	<h2><?= $projet->nom ?></h2>
        <div class="title"><?= $projet->region->nom ?></div>
        <div class="description">
            <?= $projet->description ?>
            <div class="btn_pdf">
                <?= $this->Html->link('Télcharger le plan de lotissement', $projet->plan_pdf, ['target' => 'blank']) ?>
                
            </div>
            <div class="btn_pdf">
                <?= $this->Html->link('Voir la disponibilité des terrains', ['controller' => 'Terrains', 'action' => 'index', '#chemin_allen-neil']) ?>
            </div>
            <h3>Carte de localisation</h3>
            <iframe src="<?= $projet->url_map ?>" width="93%" height="450" frameborder="0" style="border:0"></iframe>
        </div>
    </div>
    <div class="projet_right">
        <div class="onglets">
            <ul class="ongletsNavigation">
                <li><a href="#" class=" ongletGal current">Galerie photos</a></li>
                    <?php if($caractCount > 0) {?>
                        <li><a href="#" class="ongletCaract">Caractéristiques</a></li>

                    <?php } ?>
            </ul>
            <div class="ongletsContent currentTab">
                <div class="gallerie">
                    <?= $this->Html->link($this->Html->image('Admin.projets/'.$projet->dossier_image.'/'.$arrayGal[0]->nom, ['title' => $projet->nom, 'alt' => $projet->nom]), '/admin/img/projets/'.$projet->dossier_image.'/'.$arrayGal[0]->nom, ['rel' => 'lightbox', 'escape' => false]) ?>
                    <div id="thumbs">
                        <ul>
                            <?php foreach ($galeries as $galerie): ?>
                            <li>
                                <?= $this->Html->image('Admin.projets/'.$projet->dossier_image.'/'.$galerie->nom, ['rel' => 'lightbox', 'title' => $projet->nom, 'alt' => $projet->nom, 'width' => '104', 'height' => '80']) ?>
                            </li>
                            <?php endforeach; ?>

                        <div class="clear"></div>
                        </ul>
                    </div><br />
                </div> <!-- Fin galerie -->
            </div>
            <div class="ongletsContent">
                <h3>Caractéristiques et inclusions:</h3>
                <ul>
                    <?php foreach ($caracteristiques as $caracteristique): ?>
                    <li><?= $caracteristique ?></li>
                    <?php endforeach; ?>
                </ul><br>
            </div> <!-- Fin onglet visite -->
        </div><!-- Fin onglets -->
    </div><!-- Fin onglets -->
    <div class="clear"></div>
</div>
  