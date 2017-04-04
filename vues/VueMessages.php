<?php
	// Projet Annuel - BTS Info - Site Inpact
	// Fonction de la vue vues.html5/VueConnecter.php : visualiser la vue de connexion
	// Ecrit le 06/11/2016 par Killian BOUTIN
	// Modifié le 29/11/2016 par Killian BOUTIN
?>

<body>
	<div id="page">
    <header> <?php include ('Header.php'); ?> </header>
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
								if ($lu == 0 && $unMessage->getIdTo() == $unUtilisateur->getId()){ echo '<b>'; }
								echo '<div id="messages">';
									echo '<form id="FormSupprimer" action="index.php?action=MessagesPrives&choix=Supprimer&id=' . $unMessage->getId() . '" name="Suppression" method="post">';
										echo '<button id="Supprimer" name="Supprimer" value="' . $unMessage->getId() . '" type="submit" class="fa fa-trash-o"></button>';
									echo '</form>';
									echo '<a id="messages" href=index.php?action=MessagesPrives&choix=' . $_GET['choix'] . '&id=' . $unMessage->getId() . '>';
										echo '<div id="de">' . $nomFrom . " " . $prenomFrom . "</div>";
										echo '<div id="titre">' . $unMessage->getTitre();
										echo '<span style="color: #333333;"> - ' . $unMessage->getContenu() . '</span></div>';
										echo '<div id="date">' . $unMessage->getDateMessage() . '</div>';
									echo '</a>';
						
								echo '</div>';
								if ($lu == 0){ echo '</b>'; }
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
							
								echo '<div id="message">';
									echo "<b>Message de " . $nomFrom . " " . $prenomFrom;
								echo '<div id="dateMessage">' . $leMessage->getDateMessage() . '</div></b>';
								echo "</div>";
								
								echo '<div id="message">';
									echo "Objet : " . $leMessage->getTitre();
								echo "</div>";
								
								echo '<div id="message">';
									echo "Message : " . $leMessage->getContenu();
									if ($repondre){
										echo '<a href="index.php?action=MessagesPrives&choix=Repondre&id='.$leMessage->getId().'" id="repondreMessage">Répondre</a></b>';
									}
								echo "</div>";
						}
						// On est ici dans "nouveau message" ou "répondre"
						else{
							$unUtilisateurFrom = $dao->getUnUtilisateurId($leMessageReponse->getIdFrom());
							$nomFrom = $unUtilisateurFrom->getNom();
							$prenomFrom = $unUtilisateurFrom->getPrenom();
							?>
							<form id="repondre-form" method="post" action="index.php?action=MessagesPrives&choix=Repondre&id=11" role="form">
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
										Objet : <br><input type=text style="width: 90%" id="txtObjet" required value="<?php echo $unObjet ?>">
									</div>
									
									<div id="message">
										Message : <br><textarea id="txtReponse" rows="10" cols="45" required value="<?php echo $unContenu ?>"></textarea>
									</div>
									<br>
									<button type="submit" id="btnValider" class="liens">Valider</a>
									<br>
								</div>
							</form>
							<?php
						}
					}
				}
			?></p>
		</div>
		</div>
		<footer class="footer-bs fixed-bottom" id="footer"> <?php include ('Footer.php'); ?> </footer>
	</div>
</body>