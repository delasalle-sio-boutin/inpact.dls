<?php
// Projet : DLS - BTS Info - Site Inpact
// fichier : modele/Administrateur.test.php
// Rôle : test de la classe Administrateur
// Création : 08/11/2016 par Killian BOUTIN

// inclusion de la classe Administrateur
include_once ('Utilisateur.class.php');
// inclusion de la classe Outils
include_once ('Outils.class.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Test de la classe Utilisateur</title>
	<style type="text/css">body {font-family: Arial, Helvetica, sans-serif; font-size: small;}</style>
</head>
<body>

<?php
$unId = 1;
$unLogin = "boutink";
$unMdp = "admin";
$unNiveau = 1;
$unNom = "Killian";
$unPrenom = "Boutin";
$uneClasse = "SIO2";
$unMail = "aaa@aa.fr";
$uneDateNaissance = "12/12/1997";
$unNbMailFromProfs = "1";
$unNbMailFromEleves = "2";
$unUtilisateur = new Utilisateur($unId, $unLogin, $unMdp, $unNiveau ,$unNom, $unPrenom ,$uneClasse, $unMail, $uneDateNaissance, $unNbMailFromProfs, $unNbMailFromEleves);

echo ($unUtilisateur->toString());
echo ('<br>');

$unUtilisateur->setId(2);
$unUtilisateur->setLogin("brayt");
$unUtilisateur->setMdp("passe");
$unUtilisateur->setNiveau(2);
$unUtilisateur->setNom("Bray");
$unUtilisateur->setPrenom("Tony");
$unUtilisateur->setClasse("SIO1");
$unUtilisateur->setMail("bbb@bb.fr");
$unUtilisateur->setDateNaissance("13/11/1995");

echo ($unUtilisateur->toString());
echo ('<br>');
?>

</body>
</html>