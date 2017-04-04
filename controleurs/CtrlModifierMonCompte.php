<?php
// Projet Annuel - Site Inpact
// Fonction du contrôleur CtrlModifierMonCompte.php : Permettre à l'utilisateur de modifier les informations de son compte
// Ecrit le 18/12/2016 par Erwann Bienvenu
// Modifié le 03/04/2017 par Erwann Bienvenu

// Ce contrôleur vérifie si les données sont modifiées dans les input
// Affiche un pop-up à l'utilisateur si tout s'est bien passé

// TODO : Compléter le fichier || Vérifier si les informations ont été modifiées || Modifier les informations dans ce cas
// TODO : Afficher un pop-up disant si quelque chose a été modifier ou pas (On ne dit pas ce qui a été modifié


include_once 'modele/DAO.class.php';
include_once 'modele/Utilisateur.class.php';
$dao = new DAO();

$unUtilisateur = $dao->getUnUtilisateur($_SESSION['login']);
$message = "";

if (isset ($_GET['modif'])) {
	
	$nouveauMail = $_POST['txtMail'];
	
	if (isset($_POST['mailFromProfs'])) {
		
		$nouveauMailFromProfs = 1;
	} 
	else {
		
		$nouveauMailFromProfs = 0;
	}
	if (isset($_POST['mailFromEleves'])) {
		
		$nouveauMailFromEleves = 1;
	} 
	else {
		
		$nouveauMailFromEleves = 0;
	}
	
	
	$modifMail = false;
	$modifMailFromProfs = false;
	$modifMailFromEleves = false;
	
	
	$modifMail =  ($nouveauMail != $unUtilisateur->getMail()) ? true : false ;
	$modifMailFromProfs = ($nouveauMailFromProfs != $unUtilisateur->getMailFromProfs()) ? true : false ;
	$modifMailFromEleves = ($nouveauMailFromEleves != $unUtilisateur->getMailFromEleves()) ? true : false ;

	
	
	if ($modifMail || $modifMailFromProfs || $modifMailFromEleves) {
		
	    $ok = $dao->modifierProfilUtilisateur($unUtilisateur->getId(),$nouveauMail,$nouveauMailFromProfs,$nouveauMailFromEleves); 
	    
	    if ($ok) {
	    	$style = 1;
	    	$message = "Modification effectuée !";
	    }
	    else {
	    	$style = 2;
	    	$message = "Une erreur est survenue.";
	    }
	    
	}
	
}

$unUtilisateur = $dao->getUnUtilisateur($_SESSION['login']);

include_once ('vues/VueModifierMonCompte.php');
?>