<!--[if !IE]>start login wrapper<![endif]-->
<div id="login_wrapper">
	<!--[if !IE]>start login<![endif]-->
	<?= $this->Html->link('login', ['action' => ''], ['class' => 'deleteselected']) ?>
	<?= $this->Form->create() ?>
			<div class="headerSigle">
				<h1 class="sigle">Comrad</h1>
			</div>
			<div class="formular">
				<div class="formular_inner">
					<h1 class="titre">Zone sécurisé</h1>
					<label>
						<span>Votre email:</span><br>
							<?= $this->Form->input('email', ['class' => 'contact', 'required' => true, 'label' => false]) ?>
							
					</label>
					<label>
						<span>Mot de passe:</span><br>
							<?= $this->Form->input('password', ['class' => 'contact', 'required' => true, 'label' => false]) ?>
							
					</label>
						
					<div style="text-align:center;margin-top:20px;">
						<?= $this->Form->button('Connexion', ['type' => 'submit', 'class' => 'submit']) ?>
						<br>

						<?php if ( isset($_POST['error']) ) { ?>
							<script>
								  $( "#login_wrapper" ).effect( "shake" );
								  $( ".titre" ).css( "font-size","2.2em" );
								  $( ".titre" ).css( "color","#e74c3c" );
								  $( ".titre" ).html( "Accès refusé" );
							</script>
			            <?php } ?>    
		                <div class="error_msg">
		                    <div class="error_inner">
		                        <?= $this->Flash->render() ?>
		                    </div>
		                </div>
			        </div>
				</div>
			</div>
		<?= $this->Form->input('error', ['type' => 'hidden']) ?>	
	<?= $this->Form->end() ?>
</div>












