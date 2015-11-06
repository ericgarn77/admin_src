<?= $this->Html->docType(); ?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<head>
<?php echo $this->Html->charset(); ?>
<title><?php echo $data['title']; ?></title>
<!-- meta -->
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
<?= $this->Html->css('style'); ?>
<?= $this->Html->css('proxima'); ?>
<?= $this->Html->script('jquery-1.11.3.min'); ?>			
<?= $this->Html->script('jquery.jcarousel.min'); ?>
<?= $this->Html->script('script'); ?>
<?= $this->Html->script('google-analytic'); ?>
<?= $this->Html->script('https://apis.google.com/js/plusone.js'); ?>
</head>
<body>
    <div class="wrapper bg_home">
        <div id="header">
            <div class="menu">
                
                <a class="facebook-icon"></a>
            </div>
            <div class="col-33">
                <div class="logo-matte">
                    <img src="images/img/logo-matte.png" alt="logo audrey matte">
                </div>
            </div>
            <div class="col-33">
                <div class="logo-savard wrapper">
                    <img src="images/img/logo-savard.jpg" alt="logo savard desgagnés">
                </div>
                <div class="remax">
                    <img src="images/img/logo-remax.png" alt="logo remax">
                </div>
            </div>
            <div class="col-33">
                <div class="audrey">
                    <img src="images/img/audrey.png" alt="photo audrey matte">
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper">    
        <div id="integration">
            <?= $this->fetch('content') ?>
        </div>
        <div id="wrapper_footer">
            <div id="footer_content">
                <div id="footer">
                    <div id="bloc_top">
                        <div class=" menu_footer">
                        
                            <div class="clear"></div>
                        </div>
                        <div class="sociaux">
                            <a class="addthis_button_facebook_like" fb:like:layout="button_count" style="float:left; width:70px; overflow:hidden"></a> <a class="addthis_button_tweet" style="float:left; width:85px; overflow:hidden"></a> <div style="float:left; width:65px; overflow:hidden"><g:plusone size="medium"></g:plusone></div>
                            <?= $this->Html->script('http://s7.addthis.com/js/250/addthis_widget.js#username=xa-4d52b54c1ed313c2'); ?>
                        </div>
                    <div class="clear"></div>
                    </div>
                    <div class="division">
                        <img src="images/design/strip_lign.png" width="957" height="3" alt="Division" />
                    </div>
                    <div id="bloc_bottom">
                        <div class="copyright">
                            <p><strong>Audrey Matte</strong><br />courtier immobilier résidentiel</p>
                            <p class="small">© Tous droits réservés 2015 Audrey Matte<br />
                 	          Réalisation <a href="http://www.difusioninteractive.com/" title="Difusion Interactive" target="_blank" class="difusion">diFusion Interactive</a></p>
                        </div>
                        <div class="signature"><p>Franchisé indépendant et autonome<br />
                            de RE/MAX Québec inc. </p><p>C.:<strong>418.571-1691</strong><br />
                            B.:<strong>418.666-5050</strong><br />
                            F.:<strong>418.666-7848</strong><br />
                            <a href="mailto:info@audreymatte.com">info@audreymatte.com</a></p>
                        </div>
                        <div class="beau-lieu"> <a href="http://www.remax.ca/" target="_blank" title="Affilié avec Re/Max - Agence immobilière"><img    src="images/img/agence_immobiliere_remax.png" width="305" height="52" alt="Remax agence immobilière" /></a>
                            <p><strong>             agence immobilière</strong></p>
                            <p>Promenade Beauport, entrée no.2<br />3333 du Carrefour, local 250, Québec (Qc) G1C4R9<br /></p>
           	            </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>