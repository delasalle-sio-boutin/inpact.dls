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
	$mdp = '';
	$typeUtilisateur = '';
	$message = 'debut';
	include_once ('vues/VueConnecter.php');
}
else {
	// récupération des données postées
	$login = $_POST ["txtLogin"];
	$mdp = $_POST ["txtMdp"];
	
	// connexion du serveur web à la base MySQL
	include_once ('modele/DAO.class.php');
	$dao = new DAO();
	
	// test de l'authentification de l'utilisateur
	// la méthode getTypeUtilisateur de la classe DAO retourne les valeurs 'inconnu' ou 'eleve' ou 'administrateur'
	$typeUtilisateur = $dao->getTypeUtilisateur($login, $mdp);
	
	if ( $typeUtilisateur == "inconnu" ) {
		// si l'authentification est incorrecte, retour à la vue de connexion
		$message = 'Login ou mot de passe incorrect. Veuillez réessayer.';
		include_once ('vues/VueConnecter.php');
	}
	else {
		// mémorisation des données de connexion dans des variables de session
		$_SESSION['login'] = $login;
		$_SESSION['mdp'] = $mdp;
		if ($typeUtilisateur == "eleve"){$_SESSION['nom'] = $dao->getUnUtilisateur($login)->getNom();}
		$_SESSION['typeUtilisateur'] = $typeUtilisateur;
		// si l'authentification est correcte, redirection vers la page de menu
		header ("Location: index.php?action=Menu");
	}
	
	unset($dao);		// fermeture de la connexion à MySQL
}