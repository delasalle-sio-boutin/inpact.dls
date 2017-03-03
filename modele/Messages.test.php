<?php
// Projet : DLS - BTS Info - Site Inpact
// fichier : modele/Evenement.test.php
// Rôle : test de la classe Evenement
// Création : 23/11/2016 par Killian BOUTIN

// inclusion de la classe Evenement
include_once ('Messages.class.php');
// inclusion de la classe Outils
include_once ('Outils.class.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Test de la classe Message</title>
	<style type="text/css">body {font-family: Arial, Helvetica, sans-serif; font-size: small;}</style>
</head>
<body>

<?php
$unId = 1;
$unIdFrom = 3;
$unIdTo = 4;
$uneDateMessage = "20/10/2016";
$unTitre = "Devoirs";
$unContenu = "On a quoi à faire ?";
$unLu = 0;
$unMessage = new Message($unId, $unIdFrom, $unIdTo, $uneDateMessage, $unTitre, $unContenu, $unLu);

echo ($unMessage->toString());
echo ('<br>');

$unMessage->setId(2);
$unMessage->setIdFrom(4);
$unMessage->setIdTo(3);
$unMessage->setDateMessage("31/12/2018");
$unMessage->setTitre("Contrôle");
$unMessage->setContenu("On a un contrôle ?!");
$unMessage->setLu(1);

echo ($unMessage->toString());
echo ('<br>');
?>

</body>
</html>