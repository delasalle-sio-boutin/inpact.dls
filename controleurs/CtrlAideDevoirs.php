<?php

// Projet Annuel - Site Inpact
// Fonction du contrôleur CtrlAideDevoir : traiter la demande de connexion d'un utilisateur
// Modifié le 24/03/2017 par Sophie Audigou


// Ce contrôleur vérifie l'authentification de l'utilisateur
// si l'authentification est bonne, il affiche le menu élève ou administrateur (vue VueMenu.php)
// si l'authentification est incorrecte, il réaffiche la page de connexion (vue VueConnecter.php)

// inclusion de la classe Outils
include_once ('modele/Outils.class.php');
include_once ('modele/DAO.class.php');

// connexion à la classe DAO
$dao = new DAO();

$lesAideDevoirs = $dao->getTousLesAideDevoirs();
$i = 1;
foreach ($lesAideDevoirs as $uneAideDevoir){
	${'unId'.$i}= $uneAideDevoir->getId();
	${'unTitre'.$i} = $uneAideDevoir->getTitre();
	${'unContenu'.$i} = $uneAideDevoir->getContenu();
	${'uneDateCreation'.$i} = $uneAideDevoir->getDateCreation();
	${'unIdUtilisateur'.$i} = $uneAideDevoir->getIdUtilisateur();
	$i += 1;
}
if (!empty ($_GET['id'])){
	$unId = $_GET['id'];
	$uneAideDevoir = $dao->getUneAideDevoir($unId);
}
include_once ('vues/VueAideDevoirs.php');


?>