<div id="contenu">
    <div id="header">
            <div id="bienvenue">
                <h1>Tableau de bord</h1>
                <p>Bienvenue sur la gestion en ligne du site Web<br /> <a target="_blank" href="http://www.audreymatte.com/">Audrey Matte courtier immobilier résidentiel</a></p>
            </div>
            
            <div id="bonjour">
                    <p>Bonjour <span><?= $user['username']; ?></span> dans le</p>
                    <h2>Panneau de gestion</h2>
            </div>
    </div>
    <div style="clear:both;"></div>
    <div id="gestion_rapide">
            <h2>Gestionnaire de fichiers et dossiers</h2>
            <h3 class="flash"><?= $this->Flash->render() ?></h3>
            <ul class="dashboard_menu">
                <li><?= $this->Html->link(__('Ajouter un dossier d\'images<span>&nbsp;</span>'), ['controller' => 'App', 'action' => 'addDirImg'], ['class' => 'config', 'escape' => FALSE]) ?></li>
                    
                
            </ul>
    </div>

    <div style="clear:both;"></div>
</div><!-- fermetutre contenu -->
