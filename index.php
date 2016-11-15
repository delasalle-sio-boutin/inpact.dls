<?php
// Projet annuel - DLS Inpact
// Ecrit le 15/11/2016 par Killian BOUTIN
// Modifié le 15/11/2016 par Killian BOUTIN

// Fonction de la page principale index.php : analyser toutes les demandes et activer le contrôleur chargé de traiter l'action demandée

// Ce fichier est appelé par tous les liens internes, et par la validation de tous les formulaires
// il est appelé avec un paramètre action qui peut prendre les valeurs suivantes :

//    index.php?action=Connecter              : pour afficher la page de connexion
//    index.php?action=Menu                   : pour afficher le menu

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
if ( isset ($_SESSION['login']) == false)  $login = '';  else  $login = $_SESSION['login'];
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
	
	// toute autre tentative est automatiquement redirigée vers le menu
	default : {
		include_once ('controleurs/CtrlMenu.php'); break;
	}
}
