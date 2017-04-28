<?php
// -------------------------------------------------------------------------------------------------------------------------
//                                          Projet DLS - BTS Info - Site Inpact
//                                                 DAO : Data Access Object
//                             Cette classe fournit des méthodes d'accès à la bdd inpact
//                                                 Elle utilise l'objet PDO
//                       Auteur : Killian BOUTIN, Erwann BIENVENU, Tony BRAY, Florentin GREMY, Lucie QUEREL, Corentin CLEMENT, Sophie AUDIGOU
//												Dernière modification : 08/04/2017
// -------------------------------------------------------------------------------------------------------------------------

// ATTENTION : la position des méthodes dans ce fichier est identique à la position des tests dans la classe DAO.test.php

// liste des méthodes de cette classe (dans l'ordre d'apparition dans la classe) :

// __construct                   : le constructeur crée la connexion $cnx à la base de données
// __destruct                    : le destructeur ferme la connexion $cnx à la base de données

// getUnUtilisateur($unLogin) : Utilisateur
// 

// getUnUtilisateurId($unId) : Utilisateur
// 

// modifierProfilUtilisateur($unId,$unNouveauMail,$MailFromProfs,$MailFromEleves) : Boolean
//

// getUnEvenement($unId) : Evenement
// 

// getTypeUtilisateur($unLogin, $unMdp) : Chaine
// permet d'authentifier un utilisateur ; retourne 'inconnu' ou 'administrateur' ou 'professeur' ou 'eleve'

// getLesEvenements() : Tableau d'Evenements
// 

// getLesMessages() : Tableau de Messages
// 

// getLesMessagesTo() : Tableau de Messages
// 

// getLesMessagesFrom() : Tableau de Messages
// 

// getUnMessage($unId) : Message
// 

// marquerCommeLu($unId) : Boolean
// 

// envoyerMessage($unMessage);
//

// supprimerUnMessageFrom($unIdMessage) : Boolean
// 

// supprimerUnMessageTo($unIdMessage) : Boolean
//

// getLesProfs() : Professeurs
//

// addVisite() : Boolean

// certaines méthodes nécessitent les fichiers suivants :
include_once ('Utilisateur.class.php');
include_once ('Evenement.class.php');
include_once ('Outils.class.php');
include_once ('Messages.class.php');
include_once ('AideDevoirs.class.php');
include_once ('Professeurs.php');

// inclusion des paramètres de l'application
include_once ('parametres.localhost.php'); // à activer à la fin, désactiver pour DAO.test.php

// début de la classe DAO (Data Access Object)
class DAO
{
	// ------------------------------------------------------------------------------------------------------
	// ---------------------------------- Membres privés de la classe ---------------------------------------
	// ------------------------------------------------------------------------------------------------------
		
	private $cnx;				// la connexion à la base de données
	
	// ------------------------------------------------------------------------------------------------------
	// ---------------------------------- Constructeur et destructeur ---------------------------------------
	// ------------------------------------------------------------------------------------------------------
	
	// le constructeur crée la connexion $cnx à la base de données
	public function __construct() {
		global $PARAM_HOTE, $PARAM_PORT, $PARAM_BDD, $PARAM_USER, $PARAM_PWD;
		try
		{	$this->cnx = new PDO ("mysql:host=" . $PARAM_HOTE . ";port=" . $PARAM_PORT . ";dbname=" . $PARAM_BDD,
							$PARAM_USER,
							$PARAM_PWD);
			return true;
		}
		catch (Exception $ex)
		{	echo ("Echec de la connexion a la base de donnees <br>");
			echo ("Erreur numero : " . $ex->getCode() . "<br />" . "Description : " . $ex->getMessage() . "<br>");
			echo ("PARAM_HOTE = " . $PARAM_HOTE);
			return false;
		}
	}
	
	// le destructeur ferme la connexion $cnx à la base de données
	public function __destruct() {
		unset($this->cnx);
	}
	
	// fournit un objet Utilisateur à partir de son login
	// fournit la valeur null si l'id n'existe pas ou est incorrect
	// modifié par Killian BOUTIN le 01/03/2017
	public function getUnUtilisateur($unLogin)
	{	// préparation de la requete de recherche
	$txt_req = "SELECT * FROM inp_utilisateurs WHERE login = :login";
	
	$req = $this->cnx->prepare($txt_req);
	
	// liaison de la requête et de son paramètre
	$req->bindValue("login", $unLogin, PDO::PARAM_STR);
	
	// extraction des données
	$req->execute();
	$uneLigne = $req->fetch(PDO::FETCH_OBJ);
	// libère les ressources du jeu de données
	$req->closeCursor();
	
	// traitement de la réponse
	if ( ! $uneLigne)
		return null;
		else{	// création d'un objet eleve
			$unId = utf8_encode($uneLigne->id);
			$unLogin = utf8_encode($uneLigne->login);
			$unMdp = utf8_encode($uneLigne->mdp);
			$unNiveau = utf8_encode($uneLigne->niveau);
			$unNom = utf8_encode($uneLigne->nom);
			$unPrenom = utf8_encode($uneLigne->prenom);
			$uneClasse = utf8_encode($uneLigne->classe);
			$unMail = utf8_encode($uneLigne->mail);
			$uneDateNaissance = utf8_decode($uneLigne->dateNaiss);
			$unMailFromProfs = utf8_decode($uneLigne->mailFromProfs);
			$unMailFromEleves = utf8_decode($uneLigne->mailFromEleves); 
	
			$unUtilisateur = new Utilisateur($unId, $unLogin, $unMdp, $unNiveau, $unNom, $unPrenom, $uneClasse, $unMail, $uneDateNaissance, $unMailFromProfs, $unMailFromEleves);
			return $unUtilisateur;
		}
	}
	
	// Met à jour le profil d'un utilisateur grâce à son ID et ses nouveaux paramètres 
	// Fournit un booléen pour savoir si la requête s'est correctement déroulée
	// modifié par Erwann Bienvenu le 04/04/2017
	public function modifierProfilUtilisateur($unId, $unNouveauMail, $MailFromProfs, $MailFromEleves) {
		
		$txt_req = "UPDATE inp_utilisateurs SET mail = :nouveauMail, mailFromProfs = :nouveauMailFromProfs, mailFromEleves = :nouveauMailFromEleves WHERE id = :unId";
		
		$req = $this->cnx->prepare($txt_req);
		
		// liaison de la requête et de ses paramètre
		$req->bindValue("nouveauMail", $unNouveauMail, PDO::PARAM_STR);
		$req->bindValue("nouveauMailFromProfs", $MailFromProfs, PDO::PARAM_INT);
		$req->bindValue("nouveauMailFromEleves", $MailFromEleves, PDO::PARAM_INT);
		$req->bindValue("unId", $unId, PDO::PARAM_INT);
		
		$ok = $req->execute();
		
		return $ok;
	}
	
	
	// fournit un objet Utilisateur à partir de son id
	// fournit la valeur null si l'id n'existe pas ou est incorrect
	// modifié par Killian BOUTIN le 01/03/2017
	public function getUnUtilisateurId($unId)
	{	// préparation de la requete de recherche
		$txt_req = "SELECT * FROM inp_utilisateurs WHERE id = :id";
		
		$req = $this->cnx->prepare($txt_req);
		
		// liaison de la requête et de son paramètre
		$req->bindValue("id", $unId, PDO::PARAM_STR);
		
		// extraction des données
		$req->execute();
		$uneLigne = $req->fetch(PDO::FETCH_OBJ);
		// libère les ressources du jeu de données
		$req->closeCursor();
		
		// traitement de la réponse
		if ( ! $uneLigne){
			return null;
		}
		else{	// création d'un objet eleve
			$unId = utf8_encode($uneLigne->id);
			$unLogin = utf8_encode($uneLigne->login);
			$unMdp = utf8_encode($uneLigne->mdp);
			$unNiveau = utf8_encode($uneLigne->niveau);
			$unNom = utf8_encode($uneLigne->nom);
			$unPrenom = utf8_encode($uneLigne->prenom);
			$uneClasse = utf8_encode($uneLigne->classe);
			$unMail = utf8_encode($uneLigne->mail);
			$uneDateNaissance = utf8_decode($uneLigne->dateNaiss);
			$unMailFromProfs = utf8_decode($uneLigne->mailFromProfs);
			$unMailFromEleves = utf8_decode($uneLigne->mailFromEleves);
	
			$unUtilisateur = new Utilisateur($unId, $unLogin, $unMdp, $unNiveau, $unNom, $unPrenom, $uneClasse, $unMail, $uneDateNaissance, $unMailFromProfs, $unMailFromEleves);
			return $unUtilisateur;
		}
	}
	
	// fournit un Evenement en fonction de son id
	// renvoie une collection d'evenements
	// modifié par Killian BOUTIN le 03/03/2017
	public function getUnEvenement($unId)
	{	// préparation de la requête d'extraction des inscriptions non annulées
	$txt_req = "SELECT *";
	$txt_req .= " FROM inp_evenements";
	$txt_req .= " WHERE id = :unId";
	$req = $this->cnx->prepare($txt_req);
	
	// liaison de la requête et de son paramètre
	$req->bindValue("unId", $unId, PDO::PARAM_INT);
	
	// extraction des données
	$req->execute();
	$uneLigne = $req->fetch(PDO::FETCH_OBJ);
	
	if (!$uneLigne) return null;
	
	// création d'un objet Inscription
	$unId = utf8_encode($uneLigne->id);
	$unTitre = utf8_encode($uneLigne->titre);
	$unContenu = utf8_encode($uneLigne->contenu);
	$uneDateCreation = utf8_encode($uneLigne->dateCreation);
	$uneDateEvenement = utf8_encode($uneLigne->dateEvenement);
	
	$unEvenement = new Evenement($unId, $unTitre, $unContenu, $uneDateCreation, $uneDateEvenement);
	// libère les ressources du jeu de données
	$req->closeCursor();
	
	return $unEvenement;
	}
	
	// fournit une aideDevoir en fonction de son id
	// renvoie une collection d'aideDevoirs
	// modifié par Sophie Audigou le 24/03/2017
	public function getUneAideDevoir($unId)
	{	// préparation de la requête d'extraction des inscriptions non annulées
	$txt_req = "SELECT *";
	$txt_req .= " FROM inp_aidedevoirs";
	$txt_req .= " WHERE id = :unId";
	$req = $this->cnx->prepare($txt_req);
	
	// liaison de la requête et de son paramètre
	$req->bindValue("unId", $unId, PDO::PARAM_INT);
	
	// extraction des données
	$req->execute();
	$uneLigne = $req->fetch(PDO::FETCH_OBJ);
	
	if (!$uneLigne) return null;
	
	// création d'un objet Inscription
	$unId = utf8_encode($uneLigne->id);
	$unTitre = utf8_encode($uneLigne->titre);
	$unContenu = utf8_encode($uneLigne->contenu);
	$uneDateCreation = utf8_encode($uneLigne->dateCreation);
	$unIdUtilisateur = utf8_encode($uneLigne->idutilisateur);
	
	$uneAideDevoir = new AideDevoir($unId, $unTitre, $unContenu, $uneDateCreation, $unIdUtilisateur);
	// libère les ressources du jeu de données
	$req->closeCursor();
	
	return $uneAideDevoir;
	}
	
	// fournit une reponse d'une aideDevoir en fonction de son id
	// renvoie une collection d'reponseaideDevoirs
	// modifié par Sophie Audigou le 24/03/2017
	public function getUneReponseAideDevoir($unIdUtilisateur, $unIdAideDevoir)
	{	// préparation de la requête d'extraction des inscriptions non annulées
	$txt_req = "SELECT *";
	$txt_req .= " FROM inp_aidedevoirreponse";
	$txt_req .= " WHERE idUtilisateur = :unIdUtilisateur";
	$txt_req .= " AND unIdAideDevoir = :unIdAideDevoir";
	$req = $this->cnx->prepare($txt_req);
	
	// liaison de la requête et de son paramètre
	$req->bindValue("unIdUtilisateur", $unIdUtilisateur, PDO::PARAM_INT);
	$req->bindValue("unIdAideDevoir", $unIdAideDevoir, PDO::PARAM_INT);
	
	// extraction des données
	$req->execute();
	$uneLigne = $req->fetch(PDO::FETCH_OBJ);
	
	if (!$uneLigne) return null;
	
	// création d'un objet Inscription
	$unIdUtilisateur = utf8_encode($uneLigne->idUtilisateur);
	$unIdAideDevoir = utf8_encode($uneLigne->idAideDevoir);
	$uneReponse = utf8_encode($uneLigne->reponse);
	$uneDateCreation = utf8_encode($uneLigne->dateCreation);
	
	$uneAideDevoirresponse = new AideDevoirReponse($unIdUtilisateur, $unIdAideDevoir, $uneReponse);
	// libère les ressources du jeu de données
	$req->closeCursor();
	
	return $uneAideDevoir;
	}
	
	
	// fournit le type d'un utilisateur identifié par $adrMail et $motDePasse
	// renvoie "eleve" ou "administrateur" ou "professeur" si authentification correcte, "inconnu" sinon
	// modifié par Killian BOUTIN le 15/11/2016
	public function getTypeUtilisateur($unLogin, $unMdp)
	{	// préparation de la requête de recherche dans la table inp_administrateurs
		$txt_req = "SELECT * FROM inp_utilisateurs WHERE login = :login AND mdp = :mdp";
		$req = $this->cnx->prepare($txt_req);
		// liaison de la requête et de ses paramètres
		$req->bindValue("login", $unLogin, PDO::PARAM_STR);
		$req->bindValue("mdp", sha1($unMdp), PDO::PARAM_STR);
		// extraction des données et comptage des réponses
		$req->execute();
		$uneLigne = $req->fetch(PDO::FETCH_OBJ);
		// libère les ressources du jeu de données
		$req->closeCursor();
		// fourniture de la réponse
		if ($uneLigne){
			if ($uneLigne->niveau == 0){
				return "eleve";
			}
			if ($uneLigne->niveau == 1){
				return "professeur";
			}
			if ($uneLigne->niveau == 2){
				return "administrateur";
			}
		}
		else{
			// si on arrive ici, c'est que l'authentification est incorrecte
			return "inconnu";
		}
	}
	
	// fournit le type d'un utilisateur identifié par $adrMail et $motDePasse
	// renvoie "eleve" ou "administrateur" ou "professeur" si authentification correcte, "inconnu" sinon
	// modifié par Killian BOUTIN le 15/11/2016
	public function getTypeUtilisateurId($unId)
	{	// préparation de la requête de recherche dans la table inp_administrateurs
		$txt_req = "SELECT * FROM inp_utilisateurs WHERE id = :id";
		$req = $this->cnx->prepare($txt_req);
		// liaison de la requête et de ses paramètres
		$req->bindValue("id", $unId, PDO::PARAM_INT);
		// extraction des données et comptage des réponses
		$req->execute();
		$uneLigne = $req->fetch(PDO::FETCH_OBJ);
		// libère les ressources du jeu de données
		$req->closeCursor();
		// fourniture de la réponse
		if ($uneLigne){
			if ($uneLigne->niveau == 0){
				return "eleve";
			}
			if ($uneLigne->niveau == 1){
				return "professeur";
			}
			if ($uneLigne->niveau == 2){
				return "administrateur";
			}
		}
		else{
			// si on arrive ici, c'est que l'authentification est incorrecte
			return "inconnu";
		}
	}
	
	// fournit les Evenements dans une collection (en ne gardant que les évèenements pas encore passés)
	// renvoie une collection d'evenements
	// modifié par Killian BOUTIN le 23/11/2016
	public function getLesEvenements()
	{	// préparation de la requête d'extraction des inscriptions non annulées
		$txt_req = "SELECT *";
		$txt_req .= " FROM inp_evenements";
		$txt_req .= " WHERE DATEDIFF(STR_TO_DATE(dateEvenement, '%d/%m/%Y'), curdate()) >= 0";
		$txt_req .= " ORDER BY STR_TO_DATE(dateEvenement, '%d/%m/%Y')";
		
		$req = $this->cnx->prepare($txt_req);
		
		// extraction des données
		$req->execute();
		$uneLigne = $req->fetch(PDO::FETCH_OBJ);

		// construction d'une collection d'objets Inscription
		$lesEvenements = array();
		
		// tant qu'une ligne est trouvée :
		while ($uneLigne)
			{	// création d'un objet Evenement
				$unId = utf8_encode($uneLigne->id);
				$unTitre = utf8_encode($uneLigne->titre);
				$unContenu = utf8_encode($uneLigne->contenu);
				$uneDateCreation = utf8_encode($uneLigne->dateCreation);
				$uneDateEvenement = utf8_encode($uneLigne->dateEvenement);
				
				$unEvenement = new Evenement($unId, $unTitre, $unContenu, $uneDateCreation, $uneDateEvenement);
				// ajout de l'inscription à la collection
				$lesEvenements[] = $unEvenement;
				// extraction de la ligne suivante
				$uneLigne = $req->fetch(PDO::FETCH_OBJ);
			}
		// libère les ressources du jeu de données
		$req->closeCursor();
		
		return $lesEvenements;
	}
	
	// fournit les Evenements dans une collection (tous les évènements)
	// renvoie une collection d'evenements
	// modifié par Florentin le 03/03/2017
	public function getTousLesEvenements()
	{	// préparation de la requête d'extraction des inscriptions non annulées
	$txt_req = "SELECT *";
	$txt_req .= " FROM inp_evenements";
	$txt_req .= " ORDER BY STR_TO_DATE(dateEvenement, '%d/%m/%Y')";
	
	$req = $this->cnx->prepare($txt_req);
	
	// extraction des données
	$req->execute();
	$uneLigne = $req->fetch(PDO::FETCH_OBJ);
	
	// construction d'une collection d'objets Inscription
	$lesEvenements = array();
	
	// tant qu'une ligne est trouvée :
	while ($uneLigne)
	{	// création d'un objet Evenement
	$unId = utf8_encode($uneLigne->id);
	$unTitre = utf8_encode($uneLigne->titre);
	$unContenu = utf8_encode($uneLigne->contenu);
	$uneDateCreation = utf8_encode($uneLigne->dateCreation);
	$uneDateEvenement = utf8_encode($uneLigne->dateEvenement);
	
	$unEvenement = new Evenement($unId, $unTitre, $unContenu, $uneDateCreation, $uneDateEvenement);
	// ajout de l'inscription à la collection
	$lesEvenements[] = $unEvenement;
	// extraction de la ligne suivante
	$uneLigne = $req->fetch(PDO::FETCH_OBJ);
	}
	// libère les ressources du jeu de données
	$req->closeCursor();
	
	return $lesEvenements;
	}
	
	
	//creer un événement dans la bdd
	//renvoie un booléen V/F
	//modifié par Florentin GREMY le 24/03/2017
	public function CreerEvenement($unTitre, $uneDateCreation,  $uneDateEvenement, $unContenu) {
		//requête d'ajout de l'évenement dans la bdd
		$txt_req = "INSERT INTO inp_evenements (titre, contenu, dateCreation, dateEvenement)";
		$txt_req .= " VALUES (:unTitre, :unContenu, :uneDateCreation, :uneDateEvenement)";
		$req = $this->cnx->prepare($txt_req);
	
		// liaison de la requête et de son paramètre
		$req->bindValue("unTitre", $unTitre, PDO::PARAM_STR);
		$req->bindValue("unContenu", $unContenu, PDO::PARAM_STR);
		$req->bindValue("uneDateCreation", $uneDateCreation, PDO::PARAM_STR);
		$req->bindValue("uneDateEvenement", $uneDateEvenement, PDO::PARAM_STR);
	
		// extraction des données
		$ok = $req->execute();
		return $ok;
	}
	
	
	//modifie un événement dans la bdd
	//renvoie un booléen V/F
	//modifié par Florentin GREMY le 03/04/2017
	public function ModifierEvenement($unTitre, $uneDateEvenement, $unContenu, $unId) {
		//requête d'ajout de l'évenement dans la bdd
		$txt_req = "UPDATE inp_evenements SET titre = :unTitre, contenu = :unContenu, dateEvenement = :uneDateEvenement";
		$txt_req .= " WHERE id = :unId";
		$req = $this->cnx->prepare($txt_req);
	
		// liaison de la requête et de son paramètre
		$req->bindValue("unTitre", $unTitre, PDO::PARAM_STR);
		$req->bindValue("unContenu", $unContenu, PDO::PARAM_STR);
		$req->bindValue("uneDateEvenement", $uneDateEvenement, PDO::PARAM_STR);
		$req->bindValue("unId", $unId, PDO::PARAM_INT);
	
		// extraction des données
		$ok = $req->execute();
		return $ok;
	}
	
	
	//supprimer un événement dans la bdd
	//renvoie un booléen V/F
	//modifié par Florentin GREMY le 03/04/2017
	public function SupprimerEvenement($unID) {
		//requête d'ajout de l'évenement dans la bdd
		$txt_req = "DELETE FROM inp_evenements WHERE id = :unID";
		$req = $this->cnx->prepare($txt_req);
	
		// liaison de la requête et de son paramètre
		$req->bindValue("unID", $unID, PDO::PARAM_INT);
	
		// extraction des données
		$ok = $req->execute();
		return $ok;
	}
	

	// fournit les aidedevoir dans une collection (en ne gardant que les évèenements pas encore passés)
	// renvoie une collection d'aidedevoir
	// modifié par Sophie Audigou le 24/03/2017
	public function getLesAideDevoirs()
	{	// préparation de la requête d'extraction des inscriptions non annulées
	$txt_req = "SELECT *";
	$txt_req .= " FROM inp_aideDevoirs";
	$txt_req .= " ORDER BY dateCreation ";
	
	$req = $this->cnx->prepare($txt_req);
	
	// extraction des données
	$req->execute();
	$uneLigne = $req->fetch(PDO::FETCH_OBJ);
	
	// construction d'une collection d'objets Inscription
	$lesAideDevoirs = array();
	
	// tant qu'une ligne est trouvée :
	while ($uneLigne)
	{	// création d'un objet Evenement
	$unId = utf8_encode($uneLigne->id);
	$unTitre = utf8_encode($uneLigne->titre);
	$unContenu = utf8_encode($uneLigne->contenu);
	$uneDateCreation = utf8_encode($uneLigne->dateCreation);
	$unIdUtilisateur = utf8_encode($uneLigne->idUtilisateur);
	
	$uneAideDevoir = new AideDevoir($unId, $unTitre, $unContenu, $uneDateCreation, $unIdUtilisateur);
	// ajout de l'inscription à la collection
	$lesAideDevoirs[] = $uneAideDevoir;
	// extraction de la ligne suivante
	$uneLigne = $req->fetch(PDO::FETCH_OBJ);
	}
	// libère les ressources du jeu de données
	$req->closeCursor();
	
	return $lesAideDevoirs;
	}
	
	// fournit les aidedevoirs dans une collection (tous les aideDevoirs)
	// renvoie une collection d'evenements
	// modifié par Sophie Audigou le 24/03/2017
	public function getTousLesAideDevoirs()
	{	// préparation de la requête d'extraction des inscriptions non annulées
	$txt_req = "SELECT *";
	$txt_req .= " FROM inp_aidedevoirs";
	$txt_req .= " ORDER BY dateCreation DESC";
	
	$req = $this->cnx->prepare($txt_req);
	
	// extraction des données
	$req->execute();
	$uneLigne = $req->fetch(PDO::FETCH_OBJ);
	
	// construction d'une collection d'objets Inscription
	$lesAideDevoirs = array();
	
	// tant qu'une ligne est trouvée :
	while ($uneLigne){	// création d'un objet Evenement
		$unId = utf8_encode($uneLigne->id);
		$unTitre = utf8_encode($uneLigne->titre);
		$unContenu = utf8_encode($uneLigne->contenu);
		$uneDateCreation = utf8_encode($uneLigne->dateCreation);
		$idUtilisateur = utf8_encode($uneLigne->idUtilisateur);
		
		$uneAideDevoirs = new AideDevoirs($unId, $unTitre, $unContenu, $uneDateCreation, $idUtilisateur);
		// ajout de l'inscription à la collection
		$lesAidesDevoirs[] = $uneAideDevoirs;
		// extraction de la ligne suivante
		$uneLigne = $req->fetch(PDO::FETCH_OBJ);
	}
	// libère les ressources du jeu de données
	$req->closeCursor();
	
	return $lesAidesDevoirs;

	}
	
	// fournit les aidedevoir dans une collection (en ne gardant que les évèenements pas encore passés)
	// renvoie une collection d'aidedevoir
	// modifié par Sophie Audigou le 24/03/2017
	public function getLesReponsesAideDevoirs($unIdAideDevoirs)
	{	// préparation de la requête d'extraction des inscriptions non annulées
		$txt_req = "SELECT *";
		$txt_req .= " FROM inp_reponseaideDevoirs";
		$txt_req .= " ORDER BY dateCreation ";
		
		$req = $this->cnx->prepare($txt_req);
		
		// extraction des données
		$req->execute();
		$uneLigne = $req->fetch(PDO::FETCH_OBJ);
		
		// construction d'une collection d'objets Inscription
		$lesReponsesAideDevoirs = array();
		
		// tant qu'une ligne est trouvée :
		while ($uneLigne)
		{	// création d'un objet Evenement
			$unIdUtilisateur = utf8_encode($uneLigne->idUtilisateur);
			$unIdAideDevoirs = utf8_encode($uneLigne->idAideDevoirs);
			$uneReponse = utf8_encode($uneLigne->reponse);
			$uneDateCreation = utf8_encode($uneLigne->dateCreation);
		
			
			$uneReponseAideDevoir = new ReponseAideDevoirs($unIdUtilisateur,$unIdAideDevoirs, $uneReponse, $uneDateCreation );
			// ajout de l'inscription à la collection
			$lesReponsesAideDevoirs[] = $uneReponseAideDevoir;
			// extraction de la ligne suivante
			$uneLigne = $req->fetch(PDO::FETCH_OBJ);
		}
		// libère les ressources du jeu de données
		$req->closeCursor();
		
		return $lesReponsesAideDevoirs;
	}
	
	// fournit les reponse de aidedevoirs dans une collection (tous les ReponseAideDevoirs)
	// renvoie une collection d'evenements
	// modifié par Sophie Audigou le 03/04/2017
	public function getTousLesReponseAideDevoirs()
	{	// préparation de la requête d'extraction des inscriptions non annulées
	$txt_req = "SELECT *";
	$txt_req .= " FROM inp_reponseaidedevoirs";
	$txt_req .= " ORDER BY dateCreation";
	
	$req = $this->cnx->prepare($txt_req);
	
	// extraction des données
	$req->execute();
	$uneLigne = $req->fetch(PDO::FETCH_OBJ);
	
	// construction d'une collection d'objets Inscription
	$lesAideDevoirs = array();
	
	// tant qu'une ligne est trouvée :
	while ($uneLigne){	// création d'un objet Evenement
		$unIdUtilisateur = utf8_encode($uneLigne->idUtilisateur);
		$unIdAideDevoir = utf8_encode($uneLigne->idAideDevoir);
		$uneReponse = utf8_encode($uneLigne->reponse);
		$uneDateCreation = utf8_encode($uneLigne->dateCreation);
	
		$uneAideDevoirs = new AideDevoirs($unIdUtilisateur, $uneAideDevoirs, $uneReponse, $uneDateCreation);
		// ajout de l'inscription à la collection
		$lesReponsesAidesDevoirs[] = $uneReponseAideDevoirs;
		// extraction de la ligne suivante
		$uneLigne = $req->fetch(PDO::FETCH_OBJ);
	}
	// libère les ressources du jeu de données
	$req->closeCursor();
	
	return $lesReponsesAidesDevoirs;
	
	}
	
	// fournit les Messages dans une collection
	// renvoie une collection de messages
	// modifié par Killian BOUTIN le 01/03/2017
	public function getLesMessages()
	{	// préparation de la requête d'extraction des inscriptions non annulées
		$txt_req = "SELECT *";
		$txt_req .= " FROM inp_messages";
		$req = $this->cnx->prepare($txt_req);
		
		// extraction des données
		$req->execute();
		$uneLigne = $req->fetch(PDO::FETCH_OBJ);
		
		// construction d'une collection d'objets Inscription
		$lesMessages = array();
		
		if (!$uneLigne) return null;
		
		// tant qu'une ligne est trouvée :
		while ($uneLigne)
		{	// création d'un objet Message
			$unId = utf8_encode($uneLigne->idMessage);
			$unIdFrom = utf8_encode($uneLigne->idFrom);
			$unIdTo = utf8_encode($uneLigne->idTo);
			$uneDateMessage = utf8_encode($uneLigne->dateMessage);
			$unTitre = utf8_encode($uneLigne->titre);
			$unContenu = utf8_encode($uneLigne->contenu);
			$unLu = utf8_encode($uneLigne->lu);
			$afficherFrom = utf8_encode($uneLigne->afficherFrom);
			$afficherTo = utf8_encode($uneLigne->afficherTo);
			
			$unMessage = new Message($unId, $unIdFrom, $unIdTo, $uneDateMessage, $unTitre, $unContenu, $unLu, $afficherFrom, $afficherTo);
			// ajout de l'inscription à la collection
			$lesMessages[] = $unMessage;
			// extraction de la ligne suivante
			$uneLigne = $req->fetch(PDO::FETCH_OBJ);
		}
		// libère les ressources du jeu de données
		$req->closeCursor();
		
		return $lesMessages;
	}
	
// fournit les Messages dans une collection reçu pour unIdTo
	// renvoie une collection de messages
	// modifié par Killian BOUTIN le 01/03/2017
	public function getLesMessagesTo($unIdTo)
	{	// préparation de la requête d'extraction
		$txt_req = "SELECT *";
		$txt_req .= " FROM inp_messages";
		$txt_req .= " WHERE idTo = :unIdTo";
		$txt_req .= " AND afficherTo = '1'";
		// On affiche les messages non lu, puis dans l'ordre décroissant de la date et de l'id pour avoir le dernier message reçu en premier
		$txt_req .= " ORDER BY lu ASC, STR_TO_DATE(dateMessage, '%d/%m/%Y') DESC, idMessage DESC";
		$req = $this->cnx->prepare($txt_req);
		
		// liaison de la requête et de son paramètre
		$req->bindValue("unIdTo", $unIdTo, PDO::PARAM_INT);
		
		// extraction des données
		$req->execute();
		$uneLigne = $req->fetch(PDO::FETCH_OBJ);
		
		// construction d'une collection d'objets Inscription
		$lesMessages = array();
		
		// si pas de ligne trouvée :
		if (!$uneLigne){
			return null;
		}
		else
		{	
			while ($uneLigne){
				$unId = utf8_encode($uneLigne->idMessage);
				$unIdFrom = utf8_encode($uneLigne->idFrom);
				$unIdTo = utf8_encode($uneLigne->idTo);
				$uneDateMessage = utf8_encode($uneLigne->dateMessage);
				$unTitre = utf8_encode($uneLigne->titre);
				$unContenu = utf8_encode($uneLigne->contenu);
				$unLu = utf8_encode($uneLigne->lu);
				$afficherFrom = utf8_encode($uneLigne->afficherFrom);
				$afficherTo = utf8_encode($uneLigne->afficherTo);
					
				$unMessage = new Message($unId, $unIdFrom, $unIdTo, $uneDateMessage, $unTitre, $unContenu, $unLu, $afficherFrom, $afficherTo);
				// ajout de l'inscription à la collection
				$lesMessages[] = $unMessage;
				// extraction de la ligne suivante
				$uneLigne = $req->fetch(PDO::FETCH_OBJ);
			}
		}
		// libère les ressources du jeu de données
		$req->closeCursor();
		
		return $lesMessages;
	}
	
	// fournit les Messages dans une collection envoie par unIdFrom
	// renvoie une collection de messages
	// modifié par Killian BOUTIN le 01/03/2017
	public function getLesMessagesFrom($unIdFrom)
	{	// préparation de la requête d'extraction des inscriptions non annulées
		$txt_req = "SELECT *";
		$txt_req .= " FROM inp_messages";
		$txt_req .= " WHERE idFrom = :unIdFrom";
		$txt_req .= " AND afficherFrom = '1'";
		// On affiche les messages dans l'ordre décroissant de la date et de l'id pour avoir le dernier message envoyé en premier
		$txt_req .= " ORDER BY STR_TO_DATE(dateMessage, '%d/%m/%Y') DESC, idMessage DESC";
		$req = $this->cnx->prepare($txt_req);
		
		// liaison de la requête et de son paramètre
		$req->bindValue("unIdFrom", $unIdFrom, PDO::PARAM_INT);
		
		// extraction des données
		$req->execute();
		$uneLigne = $req->fetch(PDO::FETCH_OBJ);
		
		// construction d'une collection d'objets Inscription
		$lesMessages = array();
		
		// si pas de ligne trouvée :
		if (!$uneLigne){
			return null;
		}
		else
		{	
			while ($uneLigne){
				// création d'un objet Message
				$unId = utf8_encode($uneLigne->idMessage);
				$unIdFrom = utf8_encode($uneLigne->idFrom);
				$unIdTo = utf8_encode($uneLigne->idTo);
				$uneDateMessage = utf8_encode($uneLigne->dateMessage);
				$unTitre = utf8_encode($uneLigne->titre);
				$unContenu = utf8_encode($uneLigne->contenu);
				$unLu = utf8_encode($uneLigne->lu);
				$afficherFrom = utf8_encode($uneLigne->afficherFrom);
				$afficherTo = utf8_encode($uneLigne->afficherTo);
					
				$unMessage = new Message($unId, $unIdFrom, $unIdTo, $uneDateMessage, $unTitre, $unContenu, $unLu, $afficherFrom, $afficherTo);
				// ajout de l'inscription à la collection
				$lesMessages[] = $unMessage;
				// extraction de la ligne suivante
				$uneLigne = $req->fetch(PDO::FETCH_OBJ);
			}
		}
		// libère les ressources du jeu de données
		$req->closeCursor();
		
		return $lesMessages;
	}
	
	// fournit les infos d'un message en fonction de l'id
	// renvoie une collection de messages
	// modifié par Killian BOUTIN le 01/03/2017
	public function getUnMessage($unIdMessage)
	{	// préparation de la requête d'extraction des inscriptions non annulées
		$txt_req = "SELECT *";
		$txt_req .= " FROM inp_messages";
		$txt_req .= " WHERE idMessage = :unIdMessage";
		$req = $this->cnx->prepare($txt_req);
		
		// liaison de la requête et de son paramètre
		$req->bindValue("unIdMessage", $unIdMessage, PDO::PARAM_INT);
		
		// extraction des données
		$req->execute();
		$uneLigne = $req->fetch(PDO::FETCH_OBJ);

		if (!$uneLigne) return null;
		
		$unId = utf8_encode($uneLigne->idMessage);
		$unIdFrom = utf8_encode($uneLigne->idFrom);
		$unIdTo = utf8_encode($uneLigne->idTo);
		$uneDateMessage = utf8_encode($uneLigne->dateMessage);
		$unTitre = utf8_encode($uneLigne->titre);
		$unContenu = utf8_encode($uneLigne->contenu);
		$unLu = utf8_encode($uneLigne->lu);
		$afficherFrom = utf8_encode($uneLigne->afficherFrom);
		$afficherTo = utf8_encode($uneLigne->afficherTo);
		
		$unMessage = new Message($unId, $unIdFrom, $unIdTo, $uneDateMessage, $unTitre, $unContenu, $unLu, $afficherFrom, $afficherTo);
		
		// libère les ressources du jeu de données
		$req->closeCursor();
		
		return $unMessage;
	}
	
	// fournit les infos d'un message en fonction de l'id
	// renvoie une collection de messages
	// modifié par Killian BOUTIN le 01/03/2017
	public function marquerCommeLu($unIdMessage)
	{	// préparation de la requête d'extraction des inscriptions non annulées
		$txt_req = "UPDATE inp_messages";
		$txt_req .= " SET lu = '1'";
		$txt_req .= " WHERE idMessage = :unIdMessage";
		$req = $this->cnx->prepare($txt_req);
		
		// liaison de la requête et de son paramètre
		$req->bindValue("unIdMessage", $unIdMessage, PDO::PARAM_INT);
		
		// extraction des données
		$ok = $req->execute();
		return $ok;
	}
	
	// fournit les infos d'un message en fonction de l'id
	// renvoie une collection de messages
	// modifié par Killian BOUTIN le 08/04/2017
	public function envoyerUnMessage($unMessage)
	{	// préparation de la requête d'extraction des inscriptions non annulées
		$txt_req = "INSERT INTO inp_messages VALUES";
		$txt_req .= " (:id, :idFrom, :idTo, :dateMessage, :titre, :contenu, :lu, :afficherFrom, :afficherTo);";
		$req = $this->cnx->prepare($txt_req);
		
		// liaison de la requête et de son paramètre
		$req->bindValue("id", $unMessage->getId(), PDO::PARAM_INT);
		$req->bindValue("idFrom", $unMessage->getIdFrom(), PDO::PARAM_INT);
		$req->bindValue("idTo", $unMessage->getIdTo(), PDO::PARAM_INT);
		$req->bindValue("dateMessage", $unMessage->getDateMessage(), PDO::PARAM_STR);
		$req->bindValue("titre", utf8_decode($unMessage->getTitre()), PDO::PARAM_STR);
		$req->bindValue("contenu", utf8_decode($unMessage->getContenu()), PDO::PARAM_STR);
		$req->bindValue("lu", utf8_decode($unMessage->getLu()), PDO::PARAM_STR);
		$req->bindValue("afficherFrom", utf8_decode($unMessage->getAfficherFrom()), PDO::PARAM_STR);
		$req->bindValue("afficherTo", utf8_decode($unMessage->getAfficherTo()), PDO::PARAM_STR);
		
		// extraction des données
		$ok = $req->execute();
		return $ok;
	}
	
// supprime un message en affichage d'un message envoyés
	// renvoie une collection de messages
	// modifié par Killian BOUTIN le 01/03/2017
	public function supprimerUnMessageFrom($unIdMessage)
	{	// préparation de la requête d'extraction des inscriptions non annulées
		$txt_req = "UPDATE inp_messages";
		$txt_req .= " SET afficherFrom = '0'";
		$txt_req .= " WHERE idMessage = :unIdMessage";
		$req = $this->cnx->prepare($txt_req);
		
		// liaison de la requête et de son paramètre
		$req->bindValue("unIdMessage", $unIdMessage, PDO::PARAM_INT);
		
		// extraction des données
		$ok = $req->execute();
		return $ok;
	}
	
	// supprime un message en affichage d'un message envoyés
	// renvoie une collection de messages
	// modifié par Killian BOUTIN le 01/03/2017
	public function supprimerUnMessageTo($unIdMessage)
	{	// préparation de la requête d'extraction des inscriptions non annulées
		$txt_req = "UPDATE inp_messages";
		$txt_req .= " SET afficherTo = '0'";
		$txt_req .= " WHERE idMessage = :unIdMessage";
		$req = $this->cnx->prepare($txt_req);
		
		// liaison de la requête et de son paramètre
		$req->bindValue("unIdMessage", $unIdMessage, PDO::PARAM_INT);
		
		// extraction des données
		$ok = $req->execute();
		return $ok;
	}
	
	// Recupère les utilisateurs dans la bdd
	// Renvoie une collection d'utilisateur
	// Créé par Killian BOUTIN
	public function getLesUtilisateurs(){
		$txt_req = "SELECT * FROM inp_utilisateurs ORDER BY classe, nom";
		$req = $this->cnx->prepare($txt_req);
		$ok = $req->execute();
	
		$uneLigne = $req->fetch(PDO::FETCH_OBJ);
		
		// construction d'une collection d'objets Inscription
		$lesUtilisateurs = array();
	
		// tant qu'une ligne est trouvée :
		while ($uneLigne)
		{	// création d'un objet Evenement
			$unId = utf8_encode($uneLigne->id);
			$unLogin = utf8_encode($uneLigne->login);
			$unMdp = utf8_encode($uneLigne->mdp);
			$unNiveau = utf8_encode($uneLigne->niveau);
			$unNom = utf8_encode($uneLigne->nom);
			$unPrenom = utf8_encode($uneLigne->prenom);
			$uneClasse = utf8_encode($uneLigne->classe);
			$unMail = utf8_encode($uneLigne->mail);
			$uneDateNaissance = utf8_encode($uneLigne->dateNaiss);
			$unMailFromProfs = utf8_encode($uneLigne->mailFromProfs);
			$unMailFromEleves = utf8_encode($uneLigne->mailFromEleves);
				
			$unUtilisateur = new Utilisateur($unId, $unLogin, $unMdp, $unNiveau, $unNom, $unPrenom, $uneClasse, $unMail, $uneDateNaissance, $unMailFromProfs, $unMailFromEleves);
			// ajout de l'inscription à la collection
			$lesUtilisateurs[] = $unUtilisateur;
			// extraction de la ligne suivante
			$uneLigne = $req->fetch(PDO::FETCH_OBJ);
		}
		// libère les ressources du jeu de données
		$req->closeCursor();
	
		return $lesUtilisateurs;
	
	}
	
	// Recupère les profs dans la bdd
	// Renvoie une collection de prof
    //Créé par Tony BRAY
	public function getLesProfs(){
		$txt_req = "SELECT * FROM inp_profs ORDER BY nom";
		$req = $this->cnx->prepare($txt_req);
		$ok = $req->execute();
		
		$uneLigne = $req->fetch(PDO::FETCH_OBJ);
		
		// construction d'une collection d'objets Inscription
		$lesProfs = array();
		
		// tant qu'une ligne est trouvée :
		while ($uneLigne)
		{	// création d'un objet Evenement
			$unId = utf8_encode($uneLigne->id);
			$unNom = utf8_encode($uneLigne->nom);
			$uneCivilite = utf8_encode($uneLigne->civilite);
			
			$unProf = new Professeur($unId, $unNom, $uneCivilite);
			// ajout de l'inscription à la collection
			$lesProfs[] = $unProf;
			// extraction de la ligne suivante
			$uneLigne = $req->fetch(PDO::FETCH_OBJ);
		}
		// libère les ressources du jeu de données
		$req->closeCursor();
		
		return $lesProfs;
		
	}

	public function addVisite(){
	    $txt_req = "UPDATE inp_param SET nbVisite = nbVisite + 1";
        $req = $this->cnx->prepare($txt_req);
        $ok = $req->execute();
        return $ok;

    }
}