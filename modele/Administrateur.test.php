<?php
// Projet : DLS - BTS Info - Site Inpact
// fichier : modele/Administrateur.test.php
// Rôle : test de la classe Administrateur
// Création : 08/11/2016 par Killian BOUTIN

// inclusion de la classe Administrateur
include_once ('Administrateur.class.php');
// inclusion de la classe Outils
include_once ('Outils.class.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Test de la classe Administrateur</title>
	<style type="text/css">body {font-family: Arial, Helvetica, sans-serif; font-size: small;}</style>
</head>
<body>

<?php
$unId = 1;
$unLogin = "boutink";
$unMdp = "admin";
$unAdministrateur = new Administrateur($unId, $unLogin, $unMdp);

echo ($unAdministrateur->toString());
echo ('<br>');

$unAdministrateur->setId(2);
$unAdministrateur->setLogin("brayt");
$unAdministrateur->setMdp("passe");

echo ($unAdministrateur->toString());
echo ('<br>');
?>

</body>
</html>