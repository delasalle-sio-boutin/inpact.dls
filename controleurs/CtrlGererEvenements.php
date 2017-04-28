<?php
// Projet Annuel - Site Inpact
// Fonction du contrôleur CtrlGererEvenements.php : Permettre à l'admin de gerer la création et la modification d'événements
// Ecrit le 24/03/2017 par Florentin GREMY
// Modifié le 24/03/2017 par Florentin GREMY

include_once 'modele/DAO.class.php';
include_once 'modele/Outils.class.php';
include_once 'modele/Evenement.class.php';
$dao = new DAO();

if (($_SESSION['typeUtilisateur'] != "administrateur") && ($_SESSION['typeUtilisateur'] != "professeur")){
	header('Location: index.php');
}

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
			echo "<script>alert('Ajout réalisé avec succès')</script>";
			
		}
		else{
			echo "<script>alert('Un problème est survenue lors de la création !')</script>";
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
	
	if (isset ($_POST['btnModifier'])){
		$unId = $_GET['id'];
		$unTitre = $_POST['txtTitreModif'];
		$unContenu = $_POST['txtContenuModif'];
		$uneDateEvenement = Outils::convertirEnDateFR($_POST['txtDateModif']);
	
		$ok = $dao->ModifierEvenement($unTitre, $uneDateEvenement, $unContenu, $unId);
	
		if ($ok){
			echo "<script>alert('Modification réalisé avec succès')</script>";	
		}
		else{
			echo "<script>alert('Un problème est survenue lors de la modification !')</script>";
		}
	} elseif (isset ($_POST['btnSupprimer'])){
		$unID = $_GET['id'];
		$ok = $dao->SupprimerEvenement($unID);
		
		if ($ok){
			echo "<script>alert('Supression réalisé avec succès')</script>";

		}
		else{
			echo "<script>alert('Un problème est survenue lors de la supression !')</script>";
		}
	}
}

include_once ('vues/VueGererEvenements.php');
?>