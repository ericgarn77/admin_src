<!doctype html>
<html lang="fr">
<?php echo $this->Html->charset(); ?>
<meta http-equiv="imagetoolbar" content="no" />
<title>Système administration <?php echo $data['title']; ?></title>
<?= $this->fetch('meta') ?>
<?= $this->Html->css('Admin.admin'); ?>
<?= $this->Html->css('Admin.jquery-smoothness'); ?>
<?= $this->Html->css('Admin.colorbox'); ?>
<?= $this->Html->css('Admin.alertify/alertify.core'); ?>
<?= $this->Html->css('Admin.fancySelect'); ?>
<?= $this->Html->css('Admin.uploadfilemulti'); ?>
<?= $this->Html->css('Admin.alertify/alertify.default'); ?>
<?= $this->Html->script('Admin.jquery-1.11.3.min'); ?>
<?= $this->Html->script('Admin.jquery-ui.min'); ?>
<?= $this->Html->script('Admin.behaviour'); ?>
<?= $this->Html->script('Admin.jquery.colorbox'); ?>
<?= $this->Html->script('Admin.equalize.min'); ?>
<?= $this->Html->script('Admin.ckeditorStandard/ckeditor'); ?>
<?= $this->Html->script('Admin.fancySelect'); ?>
<?= $this->Html->script('Admin.jquery.fileuploadmulti.min'); ?>
<?= $this->Html->script('Admin.alertify.min'); ?>
<?= $this->Html->script('Admin.script'); ?>
<?= $this->Html->script('Admin.dropfile'); ?>
<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
<script>

tinymce.init({selector:'textarea'});

</script>
<?= $this->Html->meta('favicon.ico','/favicon.ico',['type' => 'icon']); ?>
<style type="text/css">
#formlogin label.error {
    width: auto;
    display: none;
    color:#e74c3c;
    font-size:12px;
}
#formlogin input.error {
    border: 2px solid #e74c3c;
}
</style>
</head>

<body>
    <div id="headerTop">
        <h2 id="sigleBlanc">Gestion Comrad</h2>
        <?= $this->Html->link(__('Quitter'), ['controller' => 'Users', 'action' => 'logout'], ['id' => 'deconnexion']) ?>
        <div style="clear:both;"></div>
    </div>
    <?= $this->element('menu'); ?>
   
    <?= $this->fetch('content') ?>
        
    <div id="footer">
        <p id="copyright">&copy;&nbsp;<?php echo date("Y"); ?> Agence&nbsp;Comrad&nbsp;inc. Tous droits réservés</p>
        <p id="comrad">Propulsé par&nbsp;&nbsp;<?php $comrad = file_get_contents('http://comrad.ca/logo/logo.php'); echo $comrad;?></p>
    </div>


</body>
</html>




