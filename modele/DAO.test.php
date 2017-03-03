<?php
// Projet : DLS - BTS Info - Site Inpact
// Test de la classe DAO
// fichier : modele/DAO.test.php
// Création : 08/11/2016 par Killian BOUTIN
// Modification : 23/11/2016 par Killian BOUTIN

// ATTENTION : la position des tests dans ce fichier est identique à la position des méthodes testées dans la classe DAO

include_once ('Utilisateur.class.php');
include_once ('Evenement.class.php');
include_once ('Outils.class.php');
include_once ('Messages.class.php');
include_once ('../parametres.localhost.php');

// connexion du serveur web à la base MySQL
include_once ('DAO.class.php');
$dao = new DAO();

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


/*
// test de la méthode getUnUtilisateur(unLogin) ----------------------------------------------------------
// modifié par Killian le 03/03/2017
echo "<h3>Test de getUtilisateur(login) : </h3>";
$unUtilisateur = $dao->getUnUtilisateur("eleve");
if ($unUtilisateur == null){
	echo ("Identifiant \"eleve\" inexistant ! <br>");
}
else{
	echo ($unUtilisateur->toString());
	echo ('<br>');
}
$unUtilisateur = $dao->getUnUtilisateur("gremyf");
if ($unUtilisateur == null){
	echo ("Eleve \"gremyf\" inexistant ! <br>");
}
else{
	echo ($unUtilisateur->toString());
	echo ('<br>');
}
*/

/*
// test de la méthode getUnUtilisateur(unLogin) ----------------------------------------------------------
// modifié par Killian le 03/03/2017
echo "<h3>Test de getUnUtilisateurId(id) : </h3>";
$unUtilisateur = $dao->getUnUtilisateurId(2);
if ($unUtilisateur == null){
	echo ("Eleve avec l'id '2' inexistant ! <br>");
}
else{
	echo ($unUtilisateur->toString());
	echo ('<br>');
}
$unUtilisateur = $dao->getUnUtilisateurId(200);
if ($unUtilisateur == null){
	echo ("Eleve avec l'id '200' inexistant ! <br>");
}
else{
	echo ($unUtilisateur->toString());
	echo ('<br>');
}
*/

/*
// test de la méthode getUnEvenement(unId) ----------------------------------------------------------
// modifié par Killian le 03/03/2017
echo "<h3>Test de getUnEvenement(id) : </h3>";
$unEvenement = $dao->getUnEvenement(1);
if ($unEvenement == null){
	echo ("Evenement 2 inexistant ! <br>");
}
else{
	echo ($unEvenement->toString());
	echo ('<br>');
}

$unEvenement = $dao->getUnEvenement(200);
if ($unEvenement == null){
	echo ("Evenement 200 inexistant ! <br>");
}
else{
	echo ($unEvenement->toString());
	echo ('<br>');
}
*/

/*
 // test de la méthode getTypeUtilisateur(unLogin, unMdp) ----------------------------------------------------------
 // modifié par Killian le 08/11/2016
 echo "<h3>Test de getTypeUtilisateur : </h3>";
 $typeUtilisateur = $dao->getTypeUtilisateur('admin', 'admin');
 echo "<p>TypeUtilisateur de ('admin', 'admin') : <b>" . $typeUtilisateur . "</b><br>";
 $typeUtilisateur = $dao->getTypeUtilisateur('prof', 'prof');
 echo "TypeUtilisateur de ('prof', 'prof') : <b>" . $typeUtilisateur . "</b><br>";
 $typeUtilisateur = $dao->getTypeUtilisateur('eleve', 'eleve');
 echo "TypeUtilisateur de ('eleve', 'eleve') : <b>" . $typeUtilisateur . "</b><br>";
 $typeUtilisateur = $dao->getTypeUtilisateur('autre', 'autre');
 echo "TypeUtilisateur de ('autre', 'autre') : <b>" . $typeUtilisateur . "</b><br>";
*/

/*
 // test de la méthode getLesEvenements() ----------------------------------------------------------
 // modifié par Killian le 23/11/2016
 echo "<h3>Test de getLesEvenements() : </h3>";
 $lesEvenements = $dao->getLesEvenements();
 foreach ($lesEvenements as $unEvenement){
 	echo "id : " . $unEvenement->getId() . "<br>";
 	echo "titre : " . $unEvenement->getTitre() . "<br>";
 	echo "contenu : " . $unEvenement->getContenu() . "<br>";
 	echo "<br>";
 }
 */

/*
 // test de la méthode getLesMessages() ----------------------------------------------------------
 // modifié par Killian le 23/11/2016
 echo "<h3>Test de getLesMessages() : </h3>";
 $lesMessages = $dao->getLesMessages();
 foreach ($lesMessages as $unMessage){
	 echo "id : " . $unMessage->getId() . "<br>";
	 echo "from : " . $unMessage->getIdFrom() . "<br>";
	 echo "to : " . $unMessage->getIdTo() . "<br>";
	 echo "date Message : " . $unMessage->getDateMessage() . "<br>";
	 echo "titre : " . $unMessage->getTitre() . "<br>";
	 echo "contenu : " . $unMessage->getContenu() . "<br>";
	 echo "lu : " . $unMessage->getLu() . "<br>";
	 echo "<br>";
 }
*/

/*
// test de la méthode getLesMessagesTo() ----------------------------------------------------------
// modifié par Killian le 03/03/2017
echo "<h3>Test de getLesMessagesTo() : </h3>";
$lesMessages = $dao->getLesMessagesTo(3);
if (!isset($lesMessages)){
	echo "Aucun message reçu par l'id 3";
}
else{
	foreach ($lesMessages as $unMessage){
		echo "id : " . $unMessage->getId() . "<br>";
		echo "from : " . $unMessage->getIdFrom() . "<br>";
		echo "to : " . $unMessage->getIdTo() . "<br>";
		echo "date Message : " . $unMessage->getDateMessage() . "<br>";
		echo "titre : " . $unMessage->getTitre() . "<br>";
		echo "contenu : " . $unMessage->getContenu() . "<br>";
		echo "lu : " . $unMessage->getLu() . "<br>";
		echo "<br>";
	}
}
$lesMessages = $dao->getLesMessagesTo(5);
if (!isset($lesMessages)){
	echo "Aucun message reçu par l'id 5.";
}
else{
	foreach ($lesMessages as $unMessage){
	 	echo "id : " . $unMessage->getId() . "<br>";
	 	echo "from : " . $unMessage->getIdFrom() . "<br>";
	 	echo "to : " . $unMessage->getIdTo() . "<br>";
	 	echo "date Message : " . $unMessage->getDateMessage() . "<br>";
	 	echo "titre : " . $unMessage->getTitre() . "<br>";
	 	echo "contenu : " . $unMessage->getContenu() . "<br>";
	 	echo "lu : " . $unMessage->getLu() . "<br>";
	 	echo "<br>";
	}
}
*/

/*
// test de la méthode getLesMessagesFrom() ----------------------------------------------------------
// modifié par Killian le 03/03/2017
echo "<h3>Test de getLesMessagesFrom() : </h3>";
$lesMessages = $dao->getLesMessagesFrom(3);
if (!isset($lesMessages)){
	echo "Aucun message envoyé par l'id 3";
}
else{
	foreach ($lesMessages as $unMessage){
		echo "id : " . $unMessage->getId() . "<br>";
		echo "from : " . $unMessage->getIdFrom() . "<br>";
		echo "to : " . $unMessage->getIdTo() . "<br>";
		echo "date Message : " . $unMessage->getDateMessage() . "<br>";
		echo "titre : " . $unMessage->getTitre() . "<br>";
		echo "contenu : " . $unMessage->getContenu() . "<br>";
		echo "lu : " . $unMessage->getLu() . "<br>";
		echo "<br>";
	}
}
$lesMessages = $dao->getLesMessagesFrom(5);
if (!isset($lesMessages)){
	echo "Aucun message envoyé par l'id 5.";
}
else{
	foreach ($lesMessages as $unMessage){
	 	echo "id : " . $unMessage->getId() . "<br>";
	 	echo "from : " . $unMessage->getIdFrom() . "<br>";
	 	echo "to : " . $unMessage->getIdTo() . "<br>";
	 	echo "date Message : " . $unMessage->getDateMessage() . "<br>";
	 	echo "titre : " . $unMessage->getTitre() . "<br>";
	 	echo "contenu : " . $unMessage->getContenu() . "<br>";
	 	echo "lu : " . $unMessage->getLu() . "<br>";
	 	echo "<br>";
	}
}
*/

/*
// test de la méthode getUnMessage(unId) ----------------------------------------------------------
// modifié par Killian le 03/03/2017
echo "<h3>Test de getUnMessage(unId) : </h3>";
$leMessage = $dao->getUnMessage(3);
var_dump($leMessage);
if ($leMessage == null){
	echo "Aucun message avec l'id 3 <br><br>";
}
else{
	echo "id : " . $leMessage->getId() . "<br>";
	echo "from : " . $leMessage->getIdFrom() . "<br>";
	echo "to : " . $leMessage->getIdTo() . "<br>";
	echo "date Message : " . $leMessage->getDateMessage() . "<br>";
	echo "titre : " . $leMessage->getTitre() . "<br>";
	echo "contenu : " . $leMessage->getContenu() . "<br>";
	echo "lu : " . $leMessage->getLu() . "<br>";
	echo "<br>";
}

$leMessage2 = $dao->getUnMessage(9);
if ($leMessage2== null){
	echo "Aucun message avec l'id 9<br><br>";
}
else{
	echo "id : " . $leMessage2->getId() . "<br>";
	echo "from : " . $leMessage2->getIdFrom() . "<br>";
	echo "to : " . $leMessage2->getIdTo() . "<br>";
	echo "date Message : " . $leMessage2->getDateMessage() . "<br>";
	echo "titre : " . $leMessage2->getTitre() . "<br>";
	echo "contenu : " . $leMessage2->getContenu() . "<br>";
	echo "lu : " . $leMessage2->getLu() . "<br>";
	echo "<br>";
}
*/

/*
// test de la méthode marquerCommeLu(unIdMessage) ----------------------------------------------------------
// modifié par Killian le 03/03/2017
echo "<h3>Test de marquerCommeLu(unIdMessage) : </h3>";

$leMessage = $dao->getUnMessage(9);
$ok = $dao->marquerCommeLu(9);
if (!$ok){
	echo "Impossible de marquer comme lu.";
}
else{
	echo "Refresh pour voir la valeur changer et valider le test.<br>";
	echo "lu : " . $leMessage->getLu() . "<br><br>";
}
*/

/*
// test de la méthode supprimerUnMessage(unIdMessage) ----------------------------------------------------------
// modifié par Killian le 03/03/2017
echo "<h3>Test de supprimerUnMessage(unIdMessage) : </h3>";
$leMessage = $dao->getUnMessage(9);
$ok = $dao->supprimerUnMessage(9);
if (!$ok){
	echo "Impossible de supprimer le message.";
}
else{
	if ($leMessage == null){
		echo "Aucun message avec l'id 9 <br><br>";
	}
	else{
		echo "Refresh pour voir la valeur changer et valider le test.<br>";
		echo "id : " . $leMessage->getId() . "<br>";
		echo "from : " . $leMessage->getIdFrom() . "<br>";
		echo "to : " . $leMessage->getIdTo() . "<br>";
		echo "date Message : " . $leMessage->getDateMessage() . "<br>";
		echo "titre : " . $leMessage->getTitre() . "<br>";
		echo "contenu : " . $leMessage->getContenu() . "<br>";
		echo "lu : " . $leMessage->getLu() . "<br>";
		echo "<br>";
	}
}
*/