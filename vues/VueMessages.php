<?php
	// Projet Annuel - BTS Info - Site Inpact
	// Fonction de la vue vues.html5/VueConnecter.php : visualiser la vue de connexion
	// Ecrit le 06/11/2016 par Killian BOUTIN
	// Modifié le 29/11/2016 par Killian BOUTIN
?>

<body>
	<div id="page">
    <header> <?php include ('Header.php'); ?> </header>
    <div id="main">
		<div id="page-contenu">
		
			<div id="page-contenu-head">
				<ul id="menu-horizontal">
					<?php
					if (isset ($_GET['choix'])){
						if (!isset ($_GET['id'])){
							$link = "index.php?action=MessagesPrives";
						}
						else{
							$link = "index.php?action=MessagesPrives&choix=" . $_GET["choix"];
						}?>
					<a id="MsgRetour" href="<?php echo $link ?>" class="fa fa-arrow-left fa-2x"></a>
					<?php } ?>
					<li>Messages privés<?php if ($leTitre != '') echo " | " . $leTitre ?></li>
				</ul>
			</div>
			
			<div id="page-contenu-body">
				<p><?php 
					// On affiche le menu si on arrive sur la page des messages privés
					if (!empty ($leMenu)){
						$i=0;
						foreach ($leMenu as $unMenu){ ?>
							<a class="liens" href="index.php?action=MessagesPrives&choix=<?php echo $lesLiens[$i] ?>">
									<?php echo $unMenu  . " " . $lesNombres[$i]; ?>
							</a>
							<?php $i+=1;
						}
					}
					// Si on est pas dans le menu
					else{
						// Si on est dans la consultation des messages reçus ou envoyés
						if (isset($lesMessages)){
							// Si la variable est un string, c'est le message pour dire qu'il n'y a pas de message
							if (is_string($lesMessages)){
								echo '<p style="text-align: center; font-weight: bold;">'.$lesMessages.'</p>';
							}
							// Si il y a des messages
							else{
								foreach ($lesMessages as $unMessage){
									$unUtilisateurFrom = $dao->getUnUtilisateurId($unMessage->getIdFrom());
									$nomFrom = $unUtilisateurFrom->getNom();
									$prenomFrom = $unUtilisateurFrom->getPrenom();
									$lu = $unMessage->getLu();
									if ($lu == 0 && $unMessage->getIdTo() == $unUtilisateur->getId()){?> <b> <?php } ?>
									<div id="messages">
										<form id="FormSupprimer" action="index.php?action=MessagesPrives&choix=Supprimer&id=<?php echo $unMessage->getId() ?>" name="Suppression" method="post">
											<button id="Supprimer" name="Supprimer" value="<?php echo $unMessage->getId() ?>" type="submit" class="fa fa-trash-o"></button>
										</form>
										<a id="messages" href="index.php?action=MessagesPrives&choix=<?php echo $_GET['choix'] ?>&id=<?php echo $unMessage->getId() ?>">
											<div id="de"> <?php echo $nomFrom . " " . $prenomFrom ?></div>
											<div id="titre"> <?php echo $unMessage->getTitre(); ?>
											<span style="color: #333333;"> <?php echo $unMessage->getContenu() ?></span></div>
											<div id="date"> <?php echo $unMessage->getDateMessage() ?></div>
										</a>
							
									</div>
									<?php if ($lu == 0){ ?> </b> <?php }
								}
							}						
						}
						// Si on est pas dans la consultation des messages reçus ou envoyés
						else{
							// On est ici dans la consultation d'un seul message
							if (isset ($leMessage)){
								
								$unUtilisateurFrom = $dao->getUnUtilisateurId($leMessage->getIdFrom());
								$nomFrom = $unUtilisateurFrom->getNom();
								$prenomFrom = $unUtilisateurFrom->getPrenom();
								?>
									<div id="message">
										<b>Message de <?php echo $nomFrom . " " . $prenomFrom; ?>
									<div id="dateMessage"> <?php echo $leMessage->getDateMessage() ?></div></b>
									</div>
									
									<div id="message">
										Objet : <?php echo $leMessage->getTitre(); ?>
									</div>
									
									<div id="message">
										Message : <?php echo $leMessage->getContenu(); ?>
										<?php if ($repondre){ ?>
											<a href="index.php?action=MessagesPrives&choix=Repondre&id=<?php echo $leMessage->getId(); ?>" class="liens">Répondre</a></b>
										<?php } ?>
									</div>
									<?php
							}
							// On est ici dans "nouveau message" ou "répondre"
							else{
								if ($leResultat == ""){
									$unUtilisateurFrom = $dao->getUnUtilisateurId($leMessageReponse->getIdFrom());
									$nomFrom = $unUtilisateurFrom->getNom();
									$prenomFrom = $unUtilisateurFrom->getPrenom();
									?>
									<form id="repondre-form" method="post" action="index.php?action=MessagesPrives&choix=Repondre&id=<?php echo $leMessageReponse->getId()?>" role="form">
										<div id="recap">
											<div id="message">
												<b>Message de <?php echo $nomFrom ?> <?php echo $prenomFrom ?>
												<div id="dateMessage"> <?php echo $leMessageReponse->getDateMessage() ?></div></b>
											</div>
											
											<div id="message">
												Objet : <?php echo $leMessageReponse->getTitre() ?>
											</div>
											
											<div id="message">
												Message : <?php echo $leMessageReponse->getContenu() ?>
											</div>
										</div>
										
										<div id="reponse">
											<div id="message">
												<b>Répondre à <?php echo $nomFrom ?> <?php echo $prenomFrom ?></b>
											</div>
											
											<div id="message">
												Objet : <?php echo $unObjet ?>
											</div>
											
											<div id="message">
												Message : <br><textarea id="txtMessage" name="txtMessage" rows="10" cols="45" placeholder="Corps du message" required value="<?php echo $unContenu ?>"></textarea>
											</div>
											
											<input style="margin: 10px auto;" type="submit" id="btnValider" name="btnValider" class="liens" value="Valider">
										</div>
									</form>
									<?php
								}
								else{ ?>
									<p id="unResultat"> <?php echo $leResultat; ?> </p>
								<?php }
							}
						}
					}
				?></p>
			</div>
		</div>
	</div>
	<footer class="footer-bs fixed-bottom" id="footer"> <?php include ('Footer.php'); ?> </footer>
	</div>
</body>