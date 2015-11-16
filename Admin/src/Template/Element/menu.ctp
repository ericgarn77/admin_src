<div id="sidebar" class="sameHeight">
	<?= $this->Html->link($this->Html->image("Admin.comrad/logo-matte-section.png", ["id" => "logo", "alt" => "Logo Audrey Matte"]), "admin/panels/index", ['escape' => false]); ?>
    <div id="main_menu">
        <div class="inner">
	        <ul>
	        	<li><?= $this->Html->link(__('Tableau de bord'), ['controller' => 'Panels', 'action' => 'index'], ['class' => 'mainmenu dash '. $menu['panelSelected']]) ?></li>
	        	<li><?= $this->Html->link(__('Projets'), ['controller' => 'Projets', 'action' => 'index'], ['class' => 'mainmenu '. $menu['projetSelected']]) ?></li>
	            <li><?= $this->Html->link(__('Régions'), ['controller' => 'Regions', 'action' => 'index'], ['class' => 'mainmenu '. $menu['regionSelected']]) ?></li>
	            <li><?= $this->Html->link(__('Pages et contenu du site'), ['controller' => 'Pages', 'action' => 'index'], ['class' => 'mainmenu '. $menu['pageSelected']]) ?></li>
	            <li><?= $this->Html->link(__('Users'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'mainmenu '. $menu['userSelected']]) ?></li>
	            <li><?= $this->Html->link(__('Gestion'), ['controller' => 'App', 'action' => 'index'], ['class' => 'mainmenu '. $menu['gestionSelected']]) ?></li>
	        </ul>
        </div>
    </div>
</div><!-- fin sidebar -->
