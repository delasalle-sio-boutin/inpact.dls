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
				if (!empty ($leMenu)){
					$i=0;
					foreach ($leMenu as $unMenu){ ?>
						<a id="liens" href="index.php?action=MessagesPrives&choix=<?php echo $lesLiens[$i] ?>">
								<?php echo $unMenu  . " " . $lesNombres[$i]; ?>
						</a>
						<?php $i+=1;
					}
				}
				else{
					// Si on est dans la consultation des messages reçus ou envoyés
					if (isset ($lesMessages)){
						// Si la variable est un string, c'est le message pour dire qu'il n'y a pas de message
						if (is_string($lesMessages)){
							echo '<p style="text-align: center; font-weight: bold;">'.$lesMessages.'</p>';
						}
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
					else{
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
								echo "</div>";
						}
					}
				}
			?></p>
		</div>
		</div>
		<footer class="footer-bs fixed-bottom" id="footer"> <?php include ('Footer.php'); ?> </footer>
	</div>
</body>