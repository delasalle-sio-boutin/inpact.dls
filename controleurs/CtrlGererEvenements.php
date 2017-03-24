<?php
// Projet Annuel - Site Inpact
// Fonction du contrôleur CtrlGererEvenements.php : Permettre à l'admin de gerer la création et la modification d'événements
// Ecrit le 24/03/2017 par Florentin GREMY
// Modifié le 24/03/2017 par Florentin GREMY

include_once 'modele/DAO.class.php';

include_once 'modele/Evenement.class.php';
$dao = new DAO();


include_once ('vues/VueGererEvenements.php');
?>