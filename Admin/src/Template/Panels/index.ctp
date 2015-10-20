<div id="contenu">
    <div id="header">
            <div id="bienvenue">
                <h1>Tableau de bord</h1>
                <p>Bienvenue sur la gestion en ligne du site Web<br /> <a target="_blank" href="http://www.audreymatte.com/">Audrey Matte courtier immobilier résidentiel</a></p>
            </div>
            
            <div id="bonjour">
                    <p>Bonjour <span><?= $user['username']; ?></span> dans la</p>
                    <h2>Documentation</h2>
            </div>
    </div>
    <div style="clear:both;"></div>
    <div id="gestion_rapide">
            <h2>Documentation</h2>
            <ul class="dashboard_menu">
                <?php foreach ($panels as $panel): ?>
                    <li><a href="" class="config"><?= h($panel->action) ?><span>&nbsp;</span></a></li>
                <?php endforeach; ?>
            </ul>
    </div>

    <div style="clear:both;"></div>
</div><!-- fermetutre contenu -->




