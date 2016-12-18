<?php
// Projet annuel - DLS Inpact
// Ecrit le 10/11/2016 par Killian BOUTIN
// Modifié le 15/11/2016 par Killian BOUTIN

// Fonction de la page principale index.php : analyser toutes les demandes et activer le contrôleur chargé de traiter l'action demandée

// Ce fichier est appelé par tous les liens internes, et par la validation de tous les formulaires
// il est appelé avec un paramètre action qui peut prendre les valeurs suivantes :

//    index.php?action=Connecter              	: pour afficher la page de connexion
//    index.php?action=Menu                   	: pour afficher le menu
//    index.php?action=AideDevoirs            	: pour afficher la page d'Aide aux devoirs
//    index.php?action=APropos                	: pour afficher la page A Propos
//    index.php?action=Contact                	: pour afficher la page de contact
//    index.php?action=Evenements               : pour afficher la page Evenement
//    index.php?action=PolitiqueConfidentilite  : pour afficher la page Politique et confidentialité
//    index.php?action=TermesConditions         : pour afficher la page des termes et conditions
//	  index.php?action=ModifierMonCompte		: pour afficher la pgae de modification du compte
//    index.php?action=                   		: Action par defaut

session_start();				// permet d'utiliser des variables de session
 
// si $debug est égal à true, certaines variables sont affichées (pour la mise au point)
$debug = false;

// on vérifie le paramètre action de l'URL
if ( isset ($_GET['action']) == false)  $action = '';  else   $action = $_GET['action'];

// lors d'une première connexion, ou après une déconnexion, on supprime les variables de session
if ($action == '' || $action == 'Deconnecter')
{	unset ($_SESSION['login']);
	unset ($_SESSION['motDePasse']);
	unset ($_SESSION['typeUtilisateur']);
}

// pour mémoriser l'adresse mail, le mot de passe et le type d'utilisateur ("eleve", "administrateur" ou "professeur") :
if ( isset ($_SESSION['login']) == false)  $_SESSION['login'] = '';  else  $login = $_SESSION['login'];
if ( isset ($_SESSION['motDePasse']) == false)  $motDePasse = '';  else  $motDePasse = $_SESSION['motDePasse'];
if ( isset ($_SESSION['typeUtilisateur']) == false)  $typeUtilisateur = '';  else  $typeUtilisateur = $_SESSION['typeUtilisateur'];

switch($action){
	// options accessibles aux élèves (et parfois proposées aux administrateurs)
	case 'Connecter': {
		include_once ('controleurs/CtrlConnecter.php'); break;
	}
	case 'Menu': {
		include_once ('controleurs/CtrlMenu.php'); break;
	}
	case 'AideDevoirs': {
		include_once ('controleurs/CtrlAideDevoirs.php'); break;
	}
	case 'APropos': {
		include_once ('controleurs/CtrlAPropos.php'); break;
	}
	case 'Contact': {
		include_once ('controleurs/CtrlContact.php'); break;
	}
	case 'Evenements': {
		include_once ('controleurs/CtrlEvenements.php'); break;
	}
	case 'PolitiqueConfidentilite': {
		include_once ('controleurs/CtrlPolitiqueConfidentialite.php'); break;
	}
	case 'TermesConditions': {
		include_once ('controleurs/CtrlTermesConditions.php'); break;
	}
	case 'MessagesPrives': {
		include_once ('controleurs/CtrlMessages.php'); break;
	}
	case 'ModifierMonCompte': {
		include_once ('controleurs/CtrlModifierMonCompte.php'); break;
	}
	case 'Deconnecter': {
		session_destroy(); 
		include_once ('controleurs/CtrlMenu.php'); break;
	}

	// toute autre tentative est automatiquement redirigée vers le menu
	default : {
		include_once ('controleurs/CtrlMenu.php'); break;
	}
}
