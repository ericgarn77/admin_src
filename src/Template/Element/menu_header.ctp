<?= $this->Html->script('modernizr.custom'); ?>
            <ul id="menuUl">
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
                    <?= $this->Html->link(__('Mes inscriptions'), 'http://savarddesgagnes.com/', ['title' => 'Plan de maison pour construction ville de Québec', 'target' => 'blank']) ?>
                </li>
                <li>
                    <?= $this->Html->link(__('Contact'), 'http://savarddesgagnes.com/equipe/?code=103425', ['title' => 'Contact - Audrey Matte Courtier Immobilier', 'target' => 'blank']) ?>
                </li>
                
            </ul>	
            <button id="trigger-overlay" type="button">
            	<?php if ($currentPage->nom=="Accueil") echo "Accueil"; ?>
            	<?php if ($currentPage->nom=="Profil") echo "Profil"; ?>
            	<?php if ($currentPage->nom=="Mes projets") echo "Mes Projets"; ?>
            	<?php if ($currentPage->nom=="Terrains") echo "Terrains"; ?>
            	<?php if ($currentPage->nom=="Plan de maison") echo "Plan de maison"; ?>
            	<?php if ($currentPage->nom=="Contact") echo "contact"; ?>
            </button>

            <div class="overlay overlay-slidedown">
				<button type="button" class="overlay-close">Fermer</button>
				<nav>
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
                            <?= $this->Html->link(__('Mes inscriptions'), 'http://savarddesgagnes.com/', ['title' => 'Plan de maison pour construction ville de Québec', 'target' => 'blank']) ?>
                        </li>
                        <li>
                            <?= $this->Html->link(__('Contact'), 'http://savarddesgagnes.com/equipe/?code=103425', ['title' => 'Contact - Audrey Matte Courtier Immobilier', 'target' => 'blank']) ?>
                        </li>
                        <li><a target="blank" href="#">Facebook</a></li>
					</ul>
				</nav>
			</div>