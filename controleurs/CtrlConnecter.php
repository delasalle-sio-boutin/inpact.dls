<?php
// Projet Annuel - Site Inpact
// Fonction du contrôleur CtrlConnecter.php : traiter la demande de connexion d'un utilisateur
// Ecrit le 15/11/2016 par Killian BOUTIN
// Modifié le 15/11/2016 par Killian BOUTIN

// Ce contrôleur vérifie l'authentification de l'utilisateur
// si l'authentification est bonne, il affiche le menu élève ou administrateur (vue VueMenu.php)
// si l'authentification est incorrecte, il réaffiche la page de connexion (vue VueConnecter.php)

// inclusion de la classe Outils
include_once ('modele/Outils.class.php');

if ( isset ($_POST ["btnConnecter"]) == false) {
	// si les données n'ont pas été postées, c'est le premier appel du formulaire : affichage de la vue sans message d'erreur
	$login = '';
	$motDePasse = '';
	$typeUtilisateur = '';
	include_once ('vues/VueConnecter.php');
}
else {
	// récupération des données postées
	if ( empty ($_POST ["txtLogin"]) == true) $login = $_SESSION['login'];  else $login = $_POST ["txtLogin"];
	if ( empty ($_POST ["txtMotDePasse"]) == true)  $motDePasse = $_SESSION['motDePasse'];  else   $motDePasse = $_POST ["txtMotDePasse"];
		
	if ($login == '' || $motDePasse == '') {
		// si les données sont incomplètes, réaffichage de la vue avec un message explicatif
		$message = 'Données incomplètes ou incorrectes !';
		$typeMessage = 'avertissement';
		$typeUtilisateur = '';
		include_once ('VueConnecter.php');
	}
	else {
		// connexion du serveur web à la base MySQL
		include_once ('modele/DAO.class.php');
		$dao = new DAO();
		
		// test de l'authentification de l'utilisateur
		// la méthode getTypeUtilisateur de la classe DAO retourne les valeurs 'inconnu' ou 'eleve' ou 'administrateur'
		$typeUtilisateur = $dao->getTypeUtilisateur($adrMail, $motDePasse);
		
		// mémorisation des données de connexion dans des variables de session		
		$_SESSION['login'] = $login;
		$_SESSION['motDePasse'] = $motDePasse;
		$_SESSION['typeUtilisateur'] = $typeUtilisateur;
		
		if ( $typeUtilisateur == "inconnu" ) {
			// si l'authentification est incorrecte, retour à la vue de connexion
			$message = 'Authentification incorrecte !';
			include_once ($cheminDesVues . 'VueConnecter.php');
		}
		else {
			// si l'authentification est correcte, redirection vers la page de menu
			//include_once ('controleurs/CtrlMenu.php');
			header ("Location: index.php?action=Menu");
		}
		
		unset($dao);		// fermeture de la connexion à MySQL
	}
}