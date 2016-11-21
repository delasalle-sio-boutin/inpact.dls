<?php
// Projet Annuel - Site Inpact
// Fonction du contrôleur CtrlContact.php : traiter la demande de contact de l'utilisateur
// Ecrit le 18/11/2016 par Tony BRAY
// Modifié le 20/11/2016 par Killian BOUTIN

// Ce contrôleur vérifie les données exactes entrées dans le formulaire
// Envoie un mail aux administrateur si tout se passe bien

// IL FAUDRAIT QUE TU AJOUTES UNE LISTE DEROULANTE A QUI ENVOYER LE MAIL => ADMIN : leurs adr mails
//																			PROF : delasalle.sio.profs@gmail.com


if ( isset ($_POST ["btnEnvoi"]) == false) {
	// si les données n'ont pas été postées, c'est le premier appel du formulaire : affichage de la vue sans message d'erreur
	
	include_once ('vues/VueContact.php');
}
else {
	$mailAContacter = $_POST['contact'];
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$mailUtilisateur = $_POST['mail'];
	$classe = $_POST['classe'];
	$message = $_POST['message'];
	//echo $mailAContacter." ".$nom." ".$prenom." ".$mailUtilisateur." ".$classe." ".$message;
	
}
?>