<?= $contents[0]->contenu ?>
<div class="content_navigation">
	<div class="title">
		Navigation des terrains par<br />
		<?= $this->Html->image('design/division_title_section.png', ['width' => '940', 'height' => '18', 'alt' => 'Division']) ?>
	</div>
	<div class="nav_gauche">
		<div class="nav_choice">Région</div>
		<div class="nav_recherche">
			<form name="region">
				<select name="memnu_region" onchange="location.hash=this.options[this.selectedIndex].value;">
					<option value="#">Liste des régions</option>
                    <?php foreach ($regions as $region): ?>
                    <option value="#<?= $region->option ?>"><?= $region->nom ?></option>
                    <?php endforeach; ?>
				</select> 
				<a href="#" class="btn_recherche" title="Recherche des terrains par secteurs dans les régions de Québec">Recherche</a>
			</form>
		</div>
	</div>
	<div class="nav_droite">
		<div class="nav_choice">Développement</div>
		<div class="nav_recherche">
			<form name="developpement">
				<select name="memnu_region" onchange="location.hash=this.options[this.selectedIndex].value;">
					<option value="#">Liste des Développement</option>
                    <?php foreach ($developpements as $dev): ?>
                    <option value="#<?= $dev->alias ?>"><?= $dev->nom ?></option>
                    <?php endforeach; ?>
				</select> 
				<a href="#" class="btn_recherche" title="Recherche dans les projets de construciton à Québec">Recherche</a>
			</form>
		</div>
	</div>
	<div class="clear"></div>
</div>
<div class="content_terrains">
	<?php foreach ($arrayVendre as $v): ?>
	<div class="title_region"><?= $v['region_nom'] ?><a name="<?= $v['region_option'] ?>" id="<?= $v['region_option'] ?>" title="Projets de construction ville de Beauport"></a>
	</div>
		<?php $projet = $v['projetVendre']; ?>
		<div class="title_projet"><?= $projet->nom ?><a name="<?= $projet->alias ?>" id="<?= $projet->alias ?>"></a></div>
		<div class="table_descr">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			    <tr>
			      <td width="10%">Lot</td>
			      <td width="20%">Nom de rue</td>
			      <td width="20%">Municipalité</td>
			      <td width="30%">Superficie</td>
			      <td width="10%">Statut</td>
			      <td width="10%">Plan</td>
			    </tr>
			</table>
		</div>
		<div class="table_infos">
		 	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="bold">
		 		<?php $terrains = $v['projetTerrains']; ?>
				<?php foreach ($terrains as $terrain): ?>
					<?php if($terrain->statut == 'Vendu')
					{ ?>
					<tr class="rouge sold">
						<td width="10%"><?= $terrain->lot ?></td>
						<td width="20%"><?= $terrain->rue ?></td>
						<td width="20%"><?= $terrain->municipalite ?></td>
						<td width="30%"><?= $terrain->superficie ?></td>
						<td width="10%"><?= $terrain->statut ?></td>
						<td width="10%">
							<a href="pdf/<?= $projet->plan_pdf ?>">
								<?= $this->Html->image('images/icon_pdf.png', ['width' => '14', 'height' => '16', 'alt' => 'PDF']) ?>
							</a>
						</td>
					</tr>
			  <?php } else { ?>
					<tr class="white bold">
						<td width="10%"><?= $terrain->lot ?></td>
						<td width="20%"><?= $terrain->rue ?></td>
						<td width="20%"><?= $terrain->municipalite ?></td>
						<td width="30%"><?= $terrain->superficie ?></td>
						<td width="10%" class="avendre"><?= $terrain->statut ?></td>
						<td width="10%">
							<a href="pdf/<?= $projet->plan_pdf ?>">
								<?= $this->Html->image('images/icon_pdf.png', ['width' => '14', 'height' => '16', 'alt' => 'PDF']) ?>
							</a>
						</td>
					</tr>
			  <?php } ?>				
			<?php endforeach; ?>
			</table>
		</div>
	<?php endforeach; ?>
	<?php foreach ($arrayVendu as $v): ?>
	<div class="title_region"><?= $v['region_nom'] ?><a name="<?= $v['region_option'] ?>" id="<?= $v['region_option'] ?>" title="Projets de construction ville de Beauport"></a>
	</div>
		<?php $projet = $v['projetVendu']; ?>
		<div class="title_projet"><?= $projet->nom ?><a name="<?= $projet->alias ?>" id="<?= $projet->alias ?>"></a></div>
		<div class="table_descr">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			    <tr>
			      <td width="10%">Lot</td>
			      <td width="20%">Nom de rue</td>
			      <td width="20%">Municipalité</td>
			      <td width="30%">Superficie</td>
			      <td width="10%">Statut</td>
			      <td width="10%">Plan</td>
			    </tr>
			</table>
		</div>
		<div class="table_infos">
			<?= $this->Html->image('images/vendu.png', ['width' => '310', 'height' => '70', 'class' => 'vendu', 'alt' => 'vendu']) ?>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="bold">
		 		<?php $terrains = $v['projetTerrains']; ?>
				<?php foreach ($terrains as $terrain): ?>
					<tr class="sold">
						<td width="10%"><?= $terrain->lot ?></td>
						<td width="20%"><?= $terrain->rue ?></td>
						<td width="20%"><?= $terrain->municipalite ?></td>
						<td width="30%"><?= $terrain->superficie ?></td>
						<td width="10%" class="avendre"><?= $terrain->statut ?></td>
						<td width="10%">
							<a href="pdf/<?= $projet->plan_pdf ?>">
								<?= $this->Html->image('images/icon_pdf.png', ['width' => '14', 'height' => '16', 'alt' => 'PDF']) ?>
							</a>
						</td>
					</tr>
			<?php endforeach; ?>
			</table>
		</div>
	<?php endforeach; ?>
</div>