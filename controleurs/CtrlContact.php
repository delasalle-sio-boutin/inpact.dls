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

include_once 'modele/DAO.class.php';
include_once 'modele/Utilisateur.class.php';
$dao = new DAO();

if (isset ( $_POST ["btnEnvoi"] ) == false) {
	// si les données n'ont pas été postées, c'est le premier appel du formulaire : affichage de la vue sans message d'erreur
	$info = '';
	$unMessage = "";
	$unSujet = "";
	$unUtilisateur = '';

	//Cas utilisateur non connecté
	if (!isset ($_SESSION ['typeUtilisateur']) || ($_SESSION['typeUtilisateur']) == "inconnu") {
		$unNom = "";
		$unPrenom = "";
		$unMailUtilisateur = "";
		$uneClasse = "Selectionner un groupe";
		
		include_once ('vues/VueContact.php');
	}
	//Utilisateur connecté
	else{
		$login = $_SESSION['login'];
		$unUtilisateur = $dao->getUnUtilisateur($login);		$unNom = $unUtilisateur->getNom();
		$unPrenom = $unUtilisateur->getPrenom();
		$unMailUtilisateur = $unUtilisateur->getMail();
		$uneClasse = $unUtilisateur->getClasse();
		include_once ('vues/VueContact.php');
		
	}
}

else {
	$unUtilisateur = $dao->getUnUtilisateur($login);
	
	if ( empty ($_POST ["txtNom"]) == true)  $unNom = $unUtilisateur->getNom();  else   $unNom = $_POST ["txtNom"];
	if ( empty ($_POST ["txtPrenom"]) == true)  $unPrenom = $unUtilisateur->getPrenom();  else   $unPrenom = $_POST ["txtPrenom"];
	if ( empty ($_POST ["txtContact"]) == true)  $unContact = "";  else   $unContact = $_POST ["txtContact"];
	if ( empty ($_POST ["txtSujet"]) == true)  $unSujet = "";  else   $unSujet = $_POST ["txtSujet"];
	if ( empty ($_POST ["txtMail"]) == true)  $unMailUtilisateur = $unUtilisateur->getMail();  else   $unMailUtilisateur = $_POST ["txtail"];
	if ( empty ($_POST ["listClasse"]) == true)  $uneClasse = $unUtilisateur->getClasse();  else   $uneClasse = $_POST ["listClasse"];
	if ( empty ($_POST ["txtMessage"]) == true)  $unMessage = "";  else   $unMessage = $_POST ["txtMessage"];
	
	// Captcha
	
	$captcha;
	
	if(isset($_POST['g-recaptcha-response'])){
		$captcha=$_POST['g-recaptcha-response'];
	}
	
	if(!$captcha){
		$info = "Merci de prouver que vous n'êtes pas un robot.";
		include_once ('vues/VueContact.php');
	}
	
	$secretKey = "6Lcltg4UAAAAAB-Qrchie13ynGdjKFKu4EBTYaox";
	$ip = $_SERVER['REMOTE_ADDR'];
	$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
	$responseKeys = json_decode($response,true);
	
	if(intval($responseKeys["success"]) !== 1) {
		$info = "Merci de ne pas spammer le formulaire.";
		include_once ('vues/VueContact.php');
	}
	
	// Fin captcha
	
	include_once 'modele/Outils.class.php';
	$outils = new Outils ();
	$leSujet = "Message du site Inpact (" . $unSujet . ")";
	
	$messageAEnvoyer = "Message de " . strtoupper ( $unNom ) . " " . ucfirst ( $unPrenom ) . " (" . $uneClasse . ") \n";
	$messageAEnvoyer = $messageAEnvoyer . "\r" . $unMessage;
	// echo $mailAContacter." ".$nom." ".$prenom." ".$mailUtilisateur." ".$classe." ".$message;
	
	if ($outils->estUneAdrMailValide ( $unMailUtilisateur ) != true) {
		$info = "Adresse mail invalide";
		include_once ('vues/VueContact.php');
	} else {
		$outils->envoyerMail ( $unContact, $leSujet, $messageAEnvoyer, $unMailUtilisateur );
		$info = "Message envoyé avec succès.";
		include_once ('vues/VueContact.php');
	}
}
?>