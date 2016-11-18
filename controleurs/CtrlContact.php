<?php
// Projet Annuel - Site Inpact
// Fonction du contrôleur CtrlContact.php : traiter la demande de contact de l'utilisateur
// Ecrit le 18/11/2016 par Tony BRAY


if ( isset ($_POST ["btnConnecter"]) == false) {
	// si les données n'ont pas été postées, c'est le premier appel du formulaire : affichage de la vue sans message d'erreur
	
	include_once ('vues/VueContact.php');
}

