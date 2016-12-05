<?php
// Projet Annuel - Site Inpact
// Fonction du contrôleur CtrlContact.php : traiter la demande de contact de l'utilisateur
// Ecrit le 18/11/2016 par Tony BRAY
// Modifié le 05/12/2016 par Erwann Bienvenu

// Ce contrôleur vérifie les données exactes entrées dans le formulaire
// Envoie un mail aux administrateur si tout se passe bien

// IL FAUDRAIT QUE TU AJOUTES UNE LISTE DEROULANTE A QUI ENVOYER LE MAIL => ADMIN : leurs adr mails
// PROF : delasalle.sio.profs@gmail.com
// TODO : Prendre les informations de l'utilisateur si il est connecté [||||| 50% fait |||||]
// TODO : Cas de figures pour tous les types d'utilisateurs

if (isset ( $_POST ["btnEnvoi"] ) == false) {
	// si les données n'ont pas été postées, c'est le premier appel du formulaire : affichage de la vue sans message d'erreur
	$info = '';
	$nom = "";
	$prenom = "";
	$mailUtilisateur = "";
	$classe = "";
	//Cas utilisateur non connecté
	if (! isset ( $_SESSION ['typeUtilisateur'] )) {
		$nom = "";
		$prenom = "";
		$mailUtilisateur = "";
		$classe = "";
		include_once ('vues/VueContact.php');
	}
	//Utilisateur connecté
	else {
		include_once 'modele/DAO.class.php';
		include_once 'modele/Eleve.class.php';
		$dao = new DAO();
		
		//$unEleve = new Eleve();
		
		$unEleve = $dao->getEleve('eleve');
		
		$nom = $unEleve->getNom() ;
		$prenom = $unEleve->getPrenom();
		$mailUtilisateur = $unEleve->getMail();
		$classe = $unEleve->getClasse();
		include_once ('vues/VueContact.php');
		
	}
} 

else {
	include_once 'modele/Outils.class.php';
	$outils = new Outils ();
	$mailAContacter = $_POST ['contact'];
	$sujet = "Message du site Inpact (" . $_POST ['sujet'] . ")";
	$nom = $_POST ['nom'];
	$prenom = $_POST ['prenom'];
	$mailUtilisateur = $_POST ['mail'];
	$classe = $_POST ['classe'];
	$message = $_POST ['message'];
	$messageAEnvoyer = "Message de " . strtoupper ( $nom ) . " " . ucfirst ( $prenom ) . " Groupe : " . $classe . "\n";
	$messageAEnvoyer = $messageAEnvoyer . " " . $message;
	// echo $mailAContacter." ".$nom." ".$prenom." ".$mailUtilisateur." ".$classe." ".$message;
	
	if ($outils->estUneAdrMailValide ( $mailUtilisateur ) != true) {
		$info = "Adresse mail invalide";
	} else {
		$outils->envoyerMail ( $mailAContacter, $sujet, $messageAEnvoyer, $mailUtilisateur );
		$info = "Message envoyé avec succès";
		include_once ('vues/VueContact.php');
	}
}
?>