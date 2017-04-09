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
			echo 'Création de l\'évenement réussie !';
			var_dump('ajout reussie');
			exit;
		}
		else{
			echo 'Un problème est survenue lors de la création de l\'évenement !';
			var_dump('ajout pas reussie');
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
			echo 'Modification de l\'évenement réussite !';
			var_dump('modif reussie');
			
		}
		else{
			echo 'Un problème est survenue lors de la modification de l\'évenement !';
			var_dump('modif ratée');
			
		}
	} elseif (isset ($_POST['btnSupprimer'])){
		$unID = $_GET['id'];
		$ok = $dao->SupprimerEvenement($unID);
		
		if ($ok){
			var_dump('suppression reussie');
			echo 'Suppression de l\'évenement réussie !';
			exit;
		}
		else{
			echo 'Un problème est survenue lors de la suppression de l\'évenement !';
			var_dump('suppression pas reussie');
		}
	}
}

include_once ('vues/VueGererEvenements.php');
?>