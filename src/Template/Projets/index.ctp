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

    <div class="bloc_projet" style="margin-right:15px">
        <a href="projet_beauport.php" title="beauport"><img src="images/projets/beauport/thumb_vue_aerienne.jpg" width="309" height="136" alt="Projet Beauport" /></a>
        <div class="resume">
        <h5>Projet Panorama 130</h5>
        <p>Beauport</p>
        <!--<p><a href="#">Cliquer pour voir les détails</a></p>-->
        </div>
    </div>
    <div class="clear"></div>
</div>
            
        