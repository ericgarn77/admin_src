<!doctype html>
<html lang="fr">
<?php echo $this->Html->charset(); ?>
<meta http-equiv="imagetoolbar" content="no" />
<title>Système administration <?php echo $data['title']; ?></title>
<?= $this->Html->css('Admin.admin'); ?>
<?= $this->Html->css('Admin.jquery-smoothness'); ?>
<?= $this->Html->css('Admin.colorbox'); ?>
<?= $this->Html->css('Admin.alertify/alertify.core'); ?>
<?= $this->Html->css('Admin.fancySelect'); ?>
<?= $this->Html->css('Admin.alertify/alertify.default'); ?>
<?= $this->Html->script('Admin.jquery-1.11.3.min'); ?>
<?= $this->Html->script('Admin.jquery-ui.min'); ?>
<?= $this->Html->script('Admin.behaviour'); ?>
<?= $this->Html->script('Admin.jquery.colorbox'); ?>
<?= $this->Html->script('Admin.equalize.min'); ?>
<?= $this->Html->script('Admin.ckeditorStandard/ckeditor'); ?>
<?= $this->Html->script('Admin.fancySelect'); ?>
<?= $this->Html->script('Admin.alertify.min'); ?>
<?= $this->Html->script('Admin.dropfile'); ?>
<?= $this->Html->script('Admin.script'); ?>
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
        
    


</body>
</html>