<?php
// Projet Annuel - Site Inpact
// Fonction du contrôleur CtrlModifierMonCompte.php : Permettre à l'utilisateur de modifier les informations de son compte
// Ecrit le 18/12/2016 par Erwann Bienvenu
// Modifié le 18/12/2016 par Erwann Bienvenu

// Ce contrôleur vérifie si les données sont modifiées dans les input
// Affiche un pop-up à l'utilisateur si tout s'est bien passé

// TODO : Compléter le fichier || Vérifier si les informations ont été modifiées || Modifier les informations dans ce cas
// TODO : Afficher un pop-up disant si quelque chose a été modifier ou pas (On ne dit pas ce qui a été modifié


include_once 'modele/DAO.class.php';
include_once 'modele/Eleve.class.php';
$dao = new DAO();



include_once ('vues/VueModifierMonCompte.php');
?>
