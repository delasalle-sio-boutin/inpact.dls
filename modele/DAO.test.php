<?php
// Projet : DLS - BTS Info - Site Inpact
// Test de la classe DAO
// fichier : modele/DAO.test.php
// Création : 08/11/2016 par Killian BOUTIN
// Modification : 15/12/2016 par Killian BOUTIN

// ATTENTION : la position des tests dans ce fichier est identique à la position des méthodes testées dans la classe DAO

include_once ('Administrateur.class.php');


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Test de la classe DAO</title>
	<style type="text/css">body {font-family: Arial, Helvetica, sans-serif; font-size: small;}</style>
</head>
<body>

<?php
// connexion du serveur web à la base MySQL
include_once ('DAO.class.php');
$dao = new DAO();

/*
// test de la méthode getAdministrateur ----------------------------------------------------------
// modifié par Jim le 11/5/2016
echo "<h3>Test de getAdministrateur(login) : </h3>";
$unAdministrateur = $dao->getAdministrateur("admin");
if ($unAdministrateur == null)
	echo ("Identifiant \"admin\" inexistant ! <br>");
else
	echo ($unAdministrateur->toString());
	echo ('<br>');

$unAdministrateur = $dao->getAdministrateur("gremyf");
if ($unAdministrateur == null)
	echo ("Administrateur \"gremyf\" inexistant ! <br>");
else
	echo ($unAdministrateur->toString());
	echo ('<br>');
*/


 // test de la méthode getTypeUtilisateur ----------------------------------------------------------
 // modifié par Jim le 12/11/2015
 echo "<h3>Test de getTypeUtilisateur : </h3>";
 $typeUtilisateur = $dao->getTypeUtilisateur('admin', 'admin');
 echo "<p>TypeUtilisateur de ('admin', 'admin') : <b>" . $typeUtilisateur . "</b><br>";
 $typeUtilisateur = $dao->getTypeUtilisateur('prof', 'prof');
 echo "TypeUtilisateur de ('prof', 'prof') : <b>" . $typeUtilisateur . "</b><br>";
 $typeUtilisateur = $dao->getTypeUtilisateur('eleve', 'eleve');
 echo "TypeUtilisateur de ('eleve', 'eleve') : <b>" . $typeUtilisateur . "</b><br>";
 $typeUtilisateur = $dao->getTypeUtilisateur('autre', 'autre');
 echo "TypeUtilisateur de ('autre', 'autre') : <b>" . $typeUtilisateur . "</b><br>";
 