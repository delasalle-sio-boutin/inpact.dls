<?php
// Projet DLS - BTS Info - Anciens élèves
// Test de la classe Outils
// fichier : modele/Outils.test.php
// Créé par Jim le 18/6/2016

// ATTENTION : la position des tests dans ce fichier est identique à la position des méthodes testées dans la classe Outils

include_once ('Outils.class.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Test de la classe Outils</title>
	<style type="text/css">body {font-family: Arial, Helvetica, sans-serif; font-size: small;}</style>
</head>
<body>

<?php
/*
// test de la méthode redimensionnerImage($nomFichierImage, $nomDossierSource, $nomDossierDestination, $tailleMax) -------------
// créé par Jim le 18/06/2016

echo "<h3>Test de redimensionnerImage(nomFichierImage, nomDossierSource, nomDossierDestination, tailleMax) : </h3>";

?>
<form enctype="multipart/form-data" action="Outils.test.php" method="post">
	<input type="file" name="filePhoto" id="filePhoto" required><br>
	<input type="submit" value="Envoyer les données" name="btnEnvoi" id="btnEnvoi" />		
</form>

<?php

if ( ! empty ($_FILES['filePhoto'])) {
	var_dump ($_FILES['filePhoto']);
	
	echo "<br>";
	echo "Nom du fichier : " . $_FILES['filePhoto']['name'] . "<br>";
	echo "Type : " . $_FILES['filePhoto']['type'] . "<br>";
	echo "Dossier temporaire : " . $_FILES['filePhoto']['tmp_name'] . "<br>";
	echo "Erreur : " . $_FILES['filePhoto']['error'] . "<br>";
	echo "Taille : " . $_FILES['filePhoto']['size'] . "<br>";
	echo "<br>";
		
	// Initialisation des variables d'upload de la photo
	$nomFichierTemporaire = $_FILES['filePhoto']['tmp_name'];
	$nomDossierSource = '../photos.initiales/'; 			// Le dossier d'enregistrement de la photo avant réduction de taille
	$nomDossierDestination = '../images.galerie/'; 			// Le dossier d'enregistrement de la photo après réduction de taille
	$nomFichier = $_FILES['filePhoto']['name']; 			// Le fichier à télécharger
	$nomCompletFichierSource = $nomDossierSource . $nomFichier;
	$nomCompletFichierDestination = $nomDossierDestination . $nomFichier;

	echo "Nom de fichier temporaire : " . $nomFichierTemporaire . "<br>";
	echo "Nom du dossier source : " . $nomDossierSource . "<br>";
	echo "Nom du dossier de destination : " . $nomDossierDestination . "<br>";
	echo "Nom du fichier : " . $nomFichier . "<br>";
	echo "Nom complet du fichier source : " . $nomCompletFichierSource . "<br>";
	echo "Nom complet du fichier de destination : " . $nomCompletFichierDestination . "<br>";
	
	// Déplacement de la photo téléchargée dans le dossier => photos.initiales/
	move_uploaded_file($nomFichierTemporaire, $nomCompletFichierSource);
	
	$extensionFichier = strtoupper(strrchr($nomFichierTemporaire, '.'));
	echo "<br>L'extension de l'image avant de la déplacer est " . $extensionFichier . ".<br>";
	
	$extensionFichier = strtoupper(strrchr($nomCompletFichierSource, '.'));
	echo "L'extension de l'image après l'avoir déplacée est " .  $extensionFichier . ".<br>";
	
	// Récupération de la taille de l'image avant le redimensionnement
	$imageSource = Outils::getImageByNomFichier($nomCompletFichierSource);
	$largeur = Outils::getLargeurImage($imageSource);
	$hauteur = Outils::getHauteurImage($imageSource);
	echo "La largeur était de " . $largeur . "px et la hauteur était de " . $hauteur . "px.<br>";
	
	// On crée une copie réduite et on la place dans images.galerie pour ne pas effacer les autres photos
	$ok = Outils::redimensionnerImage($nomFichier, $nomDossierSource, $nomDossierDestination, 500);
	
	if ($ok) {
		// Récupération de la taille de l'image après le redimensionnement
		$imageDestination = Outils::getImageByNomFichier($nomCompletFichierDestination);
		$largeur = Outils::getLargeurImage($imageDestination);
		$hauteur = Outils::getHauteurImage($imageDestination);
		echo "La largeur est maintenant de " . $largeur . "px et la hauteur est maintenant de " . $hauteur . "px.<br>";
	}
	else{
		echo "<b>Le redimensionnement a échoué.</b>";
	}
}

*/
/*
// test de la méthode envoyerMail------------------------------------------------------------------
// ATTENTION : remplacez l'adr destinataire par votre adresse pour pouvoir vérifier la réception du mail
// créé le 09/09/2016 par Killian BOUTIN

echo "<h3>Test de l'envoi de mail avec encodage / décodage : </h3>";

$adresseDestinataire = "delasalle.sio.boutin.k@gmail.com";
$sujet = "title test de é de è de î etc ";
$message = "msg test de é de è de î etc ";
$adresseEmetteur = "delasalle.sio.eleve@gmail.com";
$ok = false;
$ok = Outils::envoyerMail ($adresseDestinataire, $sujet, $message, $adresseEmetteur);
echo ('<b>Test de la méthode envoyerMail : </b><br>');
if ($ok == true) echo ('Un mail vient d\'être envoyé !<br>');
else echo ('L\'envoi du mail a rencontré un problème !<br>');
echo ('<br>');
*/









?>

</body>
</html>