<?php
// Projet : DLS - BTS Info - Site Inpact
// fichier : modele/Evenement.test.php
// Rôle : test de la classe Evenement
// Création : 23/11/2016 par Killian BOUTIN

// inclusion de la classe Evenement
include_once ('Evenement.class.php');
// inclusion de la classe Outils
include_once ('Outils.class.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Test de la classe Evenement</title>
	<style type="text/css">body {font-family: Arial, Helvetica, sans-serif; font-size: small;}</style>
</head>
<body>

<?php
$unId = 1;
$unTitre = "DLS ARENA V4";
$unContenu = "C'est bientôt la DLS ARENA, nous esperons que vous allez aimer !";
$unEvenement = new Evenement($unId, $unTitre, $unContenu);

echo ($unEvenement->toString());
echo ('<br>');

$unEvenement->setId(2);
$unEvenement->setTitre("SOIRÉE DES ANCIENS");
$unEvenement->setContenu("La soirée des anciens se déroulera le vendredi avant les vacances de la toussaint.");

echo ($unEvenement->toString());
echo ('<br>');
?>

</body>
</html>