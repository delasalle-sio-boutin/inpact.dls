<?php
if ( isset ($_GET['choix']) == false)  $choix = '';  else   $choix = $_GET['choix'];

$titre = '';

switch($choix){

	case "consulter": { //1er cas : lire un message
		//Ici on a besoin de la valeur de l'id du mp que l'on veut lire
		$titre = 'Consultation des messages';
		break;
	}
	 
	case "nouveau": { //2eme cas : envoyer un nouveau message
		//Ici on a besoin de la valeur d'aucune variable :p
		$titre = 'Nouveau message';
		break;
	}
	 
	case "repondre": { //3eme cas : répondre à un message
		//Ici on a besoin de la valeur de l'id du membre qui nous a posté un mp
		$titre = 'Réponse à un message';
		break;
	}
	 
	case "supprimer": { //4eme cas : supprimer un message reçu
		//Ici on a besoin de la valeur de l'id du mp à supprimer
		$titre = 'Suppression d\'un message';
		break;
	}
	 
	default; //Si rien n'est demandé ou s'il y a une erreur dans l'url, on affiche la boite de mp.
	 
} //fin du switch

include_once ('vues/VueMessages.php');
?>
