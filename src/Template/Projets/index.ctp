<?= $contents[0]->contenu ?>
<div class="content_navigation">
    <div class="title">
    Consultez mes projets<br />
    <?= $this->Html->image('design/division_title_section.png', ['width' => '940', 'height' => '18', 'alt' => 'Division']) ?>
    </div>
    <div class="clear"></div>
</div>

<div class="content_vedette">
    <div class="img-vedette">
        <?= $this->Html->image('Admin.projets/'.$vedette->dossier_image.'/'.$vedette->image, ['alt' => 'Vedette']) ?>
    </div>
    <div class="vedette-droit">
        <div class="wrap-description">
            <h1>En vedette</h1>
            <div class="description-vedette">
                <p><strong><?= $vedette->description ?></strong></p>
            </div>
        </div>
        <div class="wrap-coordonne">
            <div class="adresse-vedette">
                <p><?= $vedette->adresse ?></p>
            </div>
            <div class="carte-vedette">
                <iframe class="vedette-carte" src="<?= $vedette->url_map ?>" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>  
    </div>
     <div class="clear"></div>
</div>


<div class="content_projets">
<?php foreach ($projets as $projet): ?>
    <div class="bloc_projet">
        <div class="wrap-image">
            <?php if($projet->statut == 'Vendu')
            { 
            ?>
                <div class="bande-vendu"><strong><?= $projet->statut ?></strong></div>
            <?php
            }
            ?>
            
        <?= $this->Html->link( $this->Html->image('Admin.projets/'.$projet->dossier_image.'/'.$projet->image, ['width' => '309', 'height' => '136', "alt" => "Projet façade"]),
    ['controller' => 'Projets', 'action' => 'view', $projet->id], ['escape' => false]) ?>
        </div>
        <div class="resume">
            <h5><?= $projet->nom ?></h5>
            <p><?= $projet->region->nom ?></p>
            
        </div>
    </div>
<?php endforeach; ?>
    <div class="clear"></div>
</div>
            
        