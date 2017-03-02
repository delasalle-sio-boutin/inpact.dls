<?php

include_once ('modele/DAO.class.php');
$dao = new DAO();

if ( isset ($_GET['choix']) == false)  $choix = 'Consulter';  else   $choix = $_GET['choix'];

$leTitre = '';
$leMenu = '';

if (empty ($_SESSION['login']))header("Location:index.php");

$unUtilisateur = $dao->getUnUtilisateur($_SESSION['login']);

// Recus
$lesMessagesRecus = $dao->getLesMessagesTo($unUtilisateur->getId());
$nbMessagesRecus = sizeof($lesMessagesRecus);

// Envoyes
$lesMessagesEnvoyes = $dao->getLesMessagesFrom($unUtilisateur->getId());
$nbMessagesEnvoyes = sizeof($lesMessagesEnvoyes);

switch($choix){
	
	case "Consulter": { //1er cas : lire un message
		//Ici on a besoin de la valeur de l'id du mp que l'on veut lire
		$leTitre = '';
		
		$nonlu = 0;
		if (!empty ($lesMessagesRecus)){
			foreach ($lesMessagesRecus as $unMessageRecu){
				if ($unMessageRecu->getLu() == 0){
					$nonlu += 1;
				}
			}
			if ($nonlu != 0){
				if ($nonlu == 1){
					$leTitre .= " (dont 1 message non lu)";
				}
				else{
					$leTitre .= " (dont " . $nonlu . " messages non lus)";
				}
			}
		}
		$leMenu = array('Messages reçus','Messages envoyés','Envoyer un message');
		$lesLiens = array('ConsulterRecus','ConsulterEnvoyes','Nouveau');
		$lesNombres = array("($nbMessagesRecus)", "($nbMessagesEnvoyes)", '');
		break;
	}
	
	case "ConsulterRecus": { //1er cas : lire un message
		//Ici on a besoin de la valeur de l'id du mp que l'on veut lire
		$leTitre = 'Messages reçus';
		if (!isset ($_GET['id'])){
			$lesMessages = (empty ($lesMessagesRecus)) ? "Aucun message reçu" : $lesMessagesRecus;
		}
		else{
			$leMessage = $dao->getUnMessage($_GET['id']);
			if (isset ($_GET['id'])){
				$dao->marquerCommeLu($_GET['id']);
			}
		}
		break;
	}
	
	case "ConsulterEnvoyes": { //1er cas : lire un message
		//Ici on a besoin de la valeur de l'id du mp que l'on veut lire
		$leTitre = 'Messages envoyés';
		if (!isset ($_GET['id'])){
			$lesMessages = (empty ($lesMessagesEnvoyes)) ? "Aucun message envoyé" : $lesMessagesEnvoyes;
		}
		else{
			$leMessage = $dao->getUnMessage($_GET['id']);
		}
		break;
	}
	 
	case "Nouveau": { //2eme cas : envoyer un nouveau message
		//Ici on a besoin de la valeur d'aucune variable :p
		$leTitre = 'Nouveau message';
		$lesMessages = '';
		break;
	}
	 
	case "Repondre": { //3eme cas : répondre à un message
		//Ici on a besoin de la valeur de l'id du membre qui nous a posté un mp
		$leTitre = 'Réponse à un message';
		$lesMessages = '';
		break;
	}
	 
	case "Supprimer": { //4eme cas : supprimer un message reçu
		$leTitre = "Suppression";
		if (isset ($_POST['Supprimer'])){
			$ok = $dao->supprimerUnMessage($_POST['Supprimer']);
			if ($ok){
				$lesMessages = "Message supprimé avec succès";
			}
			else{
				$lesMessages = "Suppression du message a rencontré une erreur. Merci de contacter un technicien.";
			}
		}
		else{
			$choix = '';
			header("Location:index.php?action=MessagesPrives&choix=ConsulterRecus");
		}
		break;
	}
	 
	default; //Si rien n'est demandé ou s'il y a une erreur dans l'url, on affiche la boite de mp.
	 
} //fin du switch

include_once ('vues/VueMessages.php');
?>
