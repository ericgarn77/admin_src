<ul>
	<li id="<?= $menu['selected-accueil'] ?>">
        <?= $this->Html->link(__('Accueil'), ['controller' => 'Pages', 'action' => 'index'], ['title' => 'Retour accueil - Audrey Matte Courtier Immobilier']) ?>
    </li>
    <li>
        <?= $this->Html->link(__('Profil'), 'http://savarddesgagnes.com/equipe/?code=103425', ['title' => 'Profil - Audrey Matte Courtier Immobilier', 'target' => 'blank']) ?>
    </li>
    <li id="<?= $menu['selected-projet'] ?>">
        <?= $this->Html->link(__('Mes Projets'), ['controller' => 'Pages', 'action' => 'projets'], ['title' => 'Projets de construction neuve à Québec']) ?>
    </li>
    <li id="<?= $menu['selected-terrain'] ?>">
        <?= $this->Html->link(__('Terrains'), ['controller' => 'Pages', 'action' => 'terrains'], ['title' => 'Notre liste de terrain pour construction neuve à Québec']) ?>
    </li>
    <li id="<?= $menu['selected-plan'] ?>">
        <?= $this->Html->link(__('Plan de maison'), ['controller' => 'Pages', 'action' => 'plan'], ['title' => 'Plan de maison pour construction ville de Québec']) ?>
    </li>
   
    <li>
        <?= $this->Html->link(__('Contact'), 'http://savarddesgagnes.com/equipe/?code=103425', ['title' => 'Contact - Audrey Matte Courtier Immobilier', 'target' => 'blank']) ?>
    </li>
</ul>
<?= $this->Html->script('classie'); ?>
<?= $this->Html->script('menu'); ?>
