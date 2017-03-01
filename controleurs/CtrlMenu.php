<?php
// Projet Annuel - Site Inpact
// Fonction du contrôleur Ctrlmenu.php : traiter la demande de connexion d'un utilisateur
// Ecrit le 15/11/2016 par Killian BOUTIN
// Modifié le 15/11/2016 par Killian BOUTIN

// Ce contrôleur vérifie l'authentification de l'utilisateur
// si l'authentification est bonne, il affiche le menu élève ou administrateur (vue VueMenu.php)
// si l'authentification est incorrecte, il réaffiche la page de connexion (vue VueConnecter.php)

// inclusion de la classe Outils
include_once ('modele/Outils.class.php');
include_once ('modele/DAO.class.php');

// connexion à la classe DAO
$dao = new DAO();

function dateDiff($evt){
	$now = new DateTime(date("Y-m-j"));
	$evt = new DateTime(outils::convertirEnDateUS($evt));
	$diff = $now->diff($evt);
	return $diff->format('%a');
}

$lesEvenements = $dao->getLesEvenements();
if (!empty ($lesEvenements)){
	for ($i = 0; $i <= 3; $i++){
		${'uneClass'.$i} = "ui-accueil-div" . $i;
		${'unId'.$i} = $lesEvenements[$i]->getId();
		${'unTitre'.$i} = $lesEvenements[$i]->getTitre();
		${'unContenu'.$i} = $lesEvenements[$i]->getContenu();
		${'uneDateCreation'.$i} = $lesEvenements[$i]->getDateCreation();
		${'uneDateEvenement'.$i} = $lesEvenements[$i]->getDateEvenement();
		${'unCompteARebours'.$i} = dateDiff($lesEvenements[$i]->getDateEvenement());
	}
}

include_once ('vues/VueMenu.php');
?>