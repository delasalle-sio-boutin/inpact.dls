<?php
// Projet Annuel - Site Inpact
// Fonction du contrôleur CtrlContact.php : traiter la demande de contact de l'utilisateur
// Ecrit le 18/11/2016 par Tony BRAY
// Modifié le 20/11/2016 par Killian BOUTIN

// Ce contrôleur vérifie les données exactes entrées dans le formulaire
// Envoie un mail aux administrateur si tout se passe bien

// IL FAUDRAIT QUE TU AJOUTES UNE LISTE DEROULANTE A QUI ENVOYER LE MAIL => ADMIN : leurs adr mails
// PROF : delasalle.sio.profs@gmail.com
// TODO : Prendre les informations de l'utilisateur si il est connecté
if (isset ( $_POST ["btnEnvoi"] ) == false) {
	// si les données n'ont pas été postées, c'est le premier appel du formulaire : affichage de la vue sans message d'erreur
	$info = '';
	include_once ('vues/VueContact.php');
	//Cas utilisateur non connecté
	if (! isset ( $_SESSION ['typeUtilisateur'] )) {
		$nom = "";
		$prenom = "";
		$mailUtilisateur = "";
		$classe = "";
	}
	//Utilisateur connecté
	else {
		
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