<!-- debug($data, true) -->
<?= $this->Html->docType(); ?>
<html lang="fr">
<?php echo $this->Html->charset(); ?>
<meta http-equiv="imagetoolbar" content="no" />
<title>Système administration <?php echo $data['title']; ?></title>
<?= $this->fetch('meta') ?>
<?= $this->Html->css('Admin.login'); ?>
<?= $this->Html->css('Admin.jquery-smoothness'); ?>
<?= $this->Html->script('Admin.jquery-1.11.3.min'); ?>
<?= $this->Html->script('Admin.jquery-ui.min'); ?>
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
    <?= $this->fetch('content') ?>
        
        
    <div class="clear"></div>
    <div id="footer">
        <p id="copyright">&copy;&nbsp;<?php echo date("Y"); ?> Agence&nbsp;Comrad&nbsp;inc. Tous droits réservés</p>
        <p id="comrad">Propulsé par&nbsp;&nbsp;<?php $comrad = file_get_contents('http://comrad.ca/logo/logo.php'); echo $comrad;?></p>
    </div>


</body>
</html>