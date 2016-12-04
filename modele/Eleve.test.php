<?php
// Projet : DLS - BTS Info - Site Inpact
// fichier : modele/Administrateur.test.php
// Rôle : test de la classe Administrateur
// Création : 08/11/2016 par Killian BOUTIN

// inclusion de la classe Administrateur
include_once ('Eleve.class.php');
// inclusion de la classe Outils
include_once ('Outils.class.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Test de la classe Eleve</title>
	<style type="text/css">body {font-family: Arial, Helvetica, sans-serif; font-size: small;}</style>
</head>
<body>

<?php
$unId = 1;
$unLogin = "boutink";
$unMdp = "admin";
$unNom = "Killian";
$unPrenom = "Boutin";
$unMail = "aaa@aa.fr";
$uneDateNaissance = "12/12/1997";
$uneClasse = "Sio2";

$unEleve = new Eleve($unId, $unLogin, $unMdp, $uneClasse, $unNom, $unPrenom, $unMail, $uneDateNaissance);

echo ($unEleve->toString());
echo ('<br>');

$unEleve->setId(2);
$unEleve->setLogin("brayt");
$unEleve->setMdp("passe");
$unEleve->setNom("Bray");
$unEleve->setPrenom("Tony");
$unEleve->setClasse("SIO1");
$unEleve->setMail("bbb@bb.fr");
$unEleve->setDateNaissance("13/11/1995");

echo ($unEleve->toString());
echo ('<br>');
?>

</body>
</html>