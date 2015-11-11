<?= $this->Html->docType(); ?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<head>
<?php echo $this->Html->charset(); ?>
<title><?php echo $data['title']; ?></title>
<?= $this->Html->meta(
    'description',
    'Audrey Matte, Courtier Immobilier dans la construction neuve ville de québec et les environs, construction neuve, condo, cottage'
);
?>
<?= $this->Html->meta(
    'keywords',
    'audrey, matte, courtier, immobilier, construction neuve, terrain, maison, condos, maison de ville, condo a quebec, terrain a quebec, terrain maison neuve, maison a construire, terrain pour construction, nouvelle propriete, devloppement, nouveau quartier, nouvelle construction, terrain a st catherine, terrain a val belair, terrain ancienne lorette, terrain st-brigitte, condo val-belair, condo liomoilou, condo le 18, condo urbain, nouveau projet de construction, terrain st-emile, terrain beauport, condo haut de gamme ville de québec, québec, canada'
);
?>
<?= $this->Html->meta('author', 'Agence Comrad'); ?>
<?= $this->Html->meta('copyright', 'Audrey Matte - Courtier Immobilier'); ?>
<?= $this->Html->meta('viewport', 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'); ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<!-- Stylesheet / Javascript -->
<?= $this->Html->css('proxima'); ?>
<?= $this->Html->css('style'); ?>
<?= $this->Html->css('lightbox'); ?>

<?= $this->Html->script('jquery-1.11.3.min'); ?>
<?= $this->Html->script('prototype'); ?>

<?= $this->Html->script('lightbox'); ?>
<?= $this->Html->script('script'); ?>
<?= $this->Html->script('google-analytic'); ?>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
  {lang: 'fr'}
</script>
</head>

<body>
    <div class="wrapper-section bg_section">
        <div id="header">
            <div class="menu">
                <?= $this->element('menu_header'); ?>
                <a class="facebook-icon"></a>
            </div>
            <div class="col-33">
                <div class="logo-matte-section">
                    <?= $this->Html->image('images/logo-matte-section.png', ['alt' => 'logo audrey matte']) ?>
                </div>
            </div>
            <div class="col-33">
                <div class="logo-savard-section wrapper">
                    <?= $this->Html->image('images/logo-savard-section.jpg', ['alt' => 'logo savard desgagnés']) ?>
                </div>
                <div class="remax-section">
                    <?= $this->Html->image('images/logo-remax-section.png', ['alt' => 'logo remax']) ?>
                </div>
            </div>
            <div class="col-33">
                <div class="audrey-section">
                    <?= $this->Html->image('images/audrey-section.png', ['alt' => 'photo audrey matte']) ?>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="wrapper-section">    
        <div id="integration">
            <?= $this->fetch('content') ?>
        </div>
    </div>
    <div id="wrapper_footer">
        <div id="footer_content">
            <div id="footer">
                <div id="bloc_top">
                    <div class=" menu_footer">
                        <?= $this->element('menu_footer'); ?>
                        <div class="clear"></div>
                    </div>
                    <div class="sociaux">
                        <a class="addthis_button_facebook_like" fb:like:layout="button_count" style="float:left; width:70px; overflow:hidden"></a> <a class="addthis_button_tweet" style="float:left; width:85px; overflow:hidden"></a> <div style="float:left; width:65px; overflow:hidden"><g:plusone size="medium"></g:plusone></div>
                        <?= $this->Html->script('http://s7.addthis.com/js/250/addthis_widget.js#username=xa-4d52b54c1ed313c2'); ?>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="division">
                    <?= $this->Html->image('design/strip_lign.png', ['width' => '957', 'height' => '3', 'alt' => 'Division']) ?>
                </div>
                <div id="bloc_bottom">
                    <div class="copyright">© Tous droits réservés 2012 Audrey Matte<br />
                    Réalisation <a href="http://www.difusioninteractive.com/" title="Difusion Interactive" target="_blank" class="difusion">diFusion Interactive</a></div>
                    <div class="signature"><strong>418.571-1691</strong><br />
                    <a href="mailto:info@audreymatte.com">info@audreymatte.com</a></div>
                    <div class="beau-lieu"> <a href="http://www.remax.ca/" target="_blank" title="Affilié avec Re/Max - Agence immobilière"><img src="images/img/agence_immobiliere_remax.png" width="305" height="52" alt="Remax agence immobilière" /></a>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

