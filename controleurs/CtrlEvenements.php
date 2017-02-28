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

$lesEvenements = $dao->getLesEvenements();
$i = 1;
foreach ($lesEvenements as $unEvenement){
	${'uneClass'.$i} = "ui-evenement-div";
	${'unId'.$i}= $unEvenement->getId();
	${'unTitre'.$i} = $unEvenement->getTitre();
	${'unContenu'.$i} = $unEvenement->getContenu();
	$i += 1;
}
if (!empty ($_GET['id'])){
	$unId = $_GET['id'];
	$unEvenement = $dao->getUnEvenement($unId);
}
include_once ('vues/VueEvenements.php');
?>