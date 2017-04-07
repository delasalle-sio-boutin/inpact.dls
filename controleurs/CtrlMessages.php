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
			$idMessage = $_GET['id'];
			$ok = false;
			/* On vérifie que l'id passé dans l'url correspond bien à un message reçu par l'utilisateur en question */
			foreach ($lesMessagesRecus as $unMessageRecu){
				if ($unMessageRecu->getId() == $idMessage){
					$ok = true;
				}
			}
			if ($ok){
				$leMessage = $dao->getUnMessage($idMessage);
				if (isset ($idMessage)){
					$dao->marquerCommeLu($idMessage);
				}
				$repondre = true; // on peut repondre à un message reçu
				break;
			}
			else{
				header ("Location: index.php?action=MessagesPrives");
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
			$idMessage = $_GET['id'];
			$ok = false;
			/* On vérifie que l'id passé dans l'url correspond bien à un message reçu par l'utilisateur en question */
			foreach ($lesMessagesEnvoyes as $unMessageEnvoye){
				if ($unMessageEnvoye->getId() == $idMessage){
					$ok = true;
				}
			}
			// Si il s'agit bien de un de ses messages
			if ($ok){
				$leMessage = $dao->getUnMessage($idMessage);
				$repondre = false; // on ne peut repondre à un message envoyé
				break;
			}
			// Si l'utilisateur essaye de frauder, il est redirigé vers le menu
			else{
				header ("Location: index.php?action=MessagesPrives");
			}
		}
		break;
	}

	 
	case "Nouveau": { //2eme cas : envoyer un nouveau message
		//Ici on a besoin de la valeur d'aucune variable
		$leTitre = 'Nouveau message';
		// ON FAIT PRESQUE PAREIL QUE POUR REPONDRE A UN MESSAGE
		break;
	}
	 
	case "Repondre": { //3eme cas : répondre à un message
		$leResultat = "";
		// Ici on a besoin de la valeur de l'id du membre qui nous a posté un mp
		if (!isset ($_GET['id'])){
			header ("Location: index.php?action=MessagesPrives");
		}
		else{
			$leTitre = 'Réponse à un message';
			$idMessage = $_GET['id'];			
			$ok = false;
			// On balaye tous les messages reçus
			foreach ($lesMessagesRecus as $unMessageRecu){
				// Si l'id rentré dans l'url correspond bien à un message reçu par l'utilisateur
				if ($unMessageRecu->getId() == $idMessage){
					$ok = true;
				}
			}
			/* Si il s'agit d'un de ses messages reçu, il peut y répondre */
			if (!$ok){
				header ("Location: index.php?action=MessagesPrives");
			}
			else{
				$leMessageReponse = $dao->getUnMessage($idMessage);
				/* Si on n'a pas cliqué sur le bouton valider */
				if (isset ($_POST['btnValider']) == false){
					$unObjet = $leMessageReponse->getTitre();
					$unContenu = "";
				}
				
				/* Si on a cliqué sur le bouton valider */
				else{
					$idMessage = 0; // autoincrement
					$unIdFrom = $unUtilisateur->getId();
					$unIdTo = $leMessageReponse->getIdFrom();
					$uneDateMessage = date("d/m/Y");
					$unObjet = $leMessageReponse->getTitre();
					$unContenu = $_POST['txtMessage'];
					$unLu = 0;
					$afficherFrom = 1;
					$afficherTo = 1;
					$unMessage = new Message($idMessage, $unIdFrom, $unIdTo, $uneDateMessage, $unObjet, $unContenu, $unLu, $afficherFrom, $afficherTo);
					$ok = $dao->envoyerUnMessage($unMessage);
					
					if (!$ok){
						$leResultat = "L'envoi du message a rencontré un problème. Veuillez contacter un technicien.";
					}
					else{
						$leResultat = "L'envoi du message est un succès.";
					}
				}
			}
			break;
		}
	}
	 
	case "Supprimer": { //4eme cas : supprimer un message reçu
		$leTitre = "Suppression";
		if (isset ($_POST['Supprimer'])){
			$unIdMessage = $_POST['Supprimer'];
			$idUtilisateur = $unUtilisateur->getId();
			$unMessage = $dao->getUnMessage($unIdMessage);
			
			// Si c'est un message envoyé
			if ($idUtilisateur == $unMessage->getIdFrom()){
				$ok = $dao->supprimerUnMessageFrom($unIdMessage);
				if ($ok){
					header("Location:index.php?action=MessagesPrives&choix=ConsulterEnvoyes");
				}
			}
			// Si c'est un message reçu
			elseif($idUtilisateur == $unMessage->getIdTo()){
				$ok = $dao->supprimerUnMessageTo($unIdMessage);
				if ($ok){
					header("Location:index.php?action=MessagesPrives&choix=ConsulterRecus");
				}
			}
			// Sinon, il n'a rien à faire sur ce lien, il est redirigé
			else{
				header("Location:index.php?action=MessagesPrives");
			}
			
			// Si la suppression s'est mal déroulée, on affiche un message d'erreur
			if (!$ok){
				$lesMessages = "La suppression du message a rencontré une erreur. Merci de contacter un technicien.";
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
