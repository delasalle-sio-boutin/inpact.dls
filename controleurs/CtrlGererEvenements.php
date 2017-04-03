<?php
// Projet Annuel - Site Inpact
// Fonction du contrôleur CtrlGererEvenements.php : Permettre à l'admin de gerer la création et la modification d'événements
// Ecrit le 24/03/2017 par Florentin GREMY
// Modifié le 24/03/2017 par Florentin GREMY

include_once 'modele/DAO.class.php';
include_once 'modele/Outils.class.php';

include_once 'modele/Evenement.class.php';
$dao = new DAO();

$lesEvenements = $dao->getTousLesEvenements();

/* Création */
if (!isset($_GET['id'])){
	if (isset ($_POST['btnCreation'])){
		$unTitre = $_POST['txtTitre'];
		$unContenu = $_POST['txtContenu'];
		$uneDateEvenement = Outils::convertirEnDateFR($_POST['txtDate']);
		$uneDateCreation = date("d/m/Y");
		
		$ok = $dao->CreerEvenement($unTitre, $uneDateCreation, $uneDateEvenement, $unContenu);
		
		if ($ok){
			echo 'Création de l\'évenement réussite !';
		}
		else{
			echo 'Un problème est survenue lors de la création de l\'évenement !';
		}
	} elseif (isset ($_POST['btnModifier'])){
		$unTitre = $_POST['txtTitre'];
		$unContenu = $_POST['txtContenu'];
		$uneDateEvenement = Outils::convertirEnDateFR($_POST['txtDate']);
		$uneDateCreation = date("d/m/Y");
		
		$ok = $dao->ModifierEvenement($unTitre, $uneDateCreation, $uneDateEvenement, $unContenu);
		
		if ($ok){
			echo 'Création de l\'évenement réussite !';
		}
		else{
			echo 'Un problème est survenue lors de la création de l\'évenement !';
		}
	} elseif (isset ($_POST['btnSupprimer'])){
		$ok = $dao->SupprimerEvenement($unId);
		
		if ($ok){
			echo 'Création de l\'évenement réussite !';
		}
		else{
			echo 'Un problème est survenue lors de la création de l\'évenement !';
		}
	}
}
/* Modification */
else{
	$unEvenement = $dao->getUnEvenement($_GET['id']);
	$unTitre = $unEvenement->getTitre();
	$unContenu = $unEvenement->getContenu();
	$uneDateEvenement = $unEvenement->getDateEvenement();
	$uneDateUS = Outils::convertirEnDateUS($uneDateEvenement);
	$uneDateCreation = date("d/m/Y");
}

include_once ('vues/VueGererEvenements.php');
?>