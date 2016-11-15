<?php
// -------------------------------------------------------------------------------------------------------------------------
//                                          Projet DLS - BTS Info - Site Inpact
//                                                 DAO : Data Access Object
//                             Cette classe fournit des méthodes d'accès à la bdd inpact
//                                                 Elle utilise l'objet PDO
//                       Auteur : Killian BOUTIN, Erwann BIENVENU, Tony BRAY, Florentin GREMY, Lucie QUEREL, Corentin CLEMENT, Sophie AUDIGOU
//												Dernière modification : 08/11/2016
// -------------------------------------------------------------------------------------------------------------------------

// ATTENTION : la position des méthodes dans ce fichier est identique à la position des tests dans la classe DAO.test.php

// liste des méthodes de cette classe (dans l'ordre d'apparition dans la classe) :

// __construct                   : le constructeur crée la connexion $cnx à la base de données
// __destruct                    : le destructeur ferme la connexion $cnx à la base de données

// getAdministrateur($unLogin) : Administrateur
//   recherche et fournit un objet Administrateur à partir de son identifiant
//   fournit la valeur null si le paramètre n'existe pas ou est incorrect

// getProfesseur($unLogin) : Professeur
//   recherche et fournit un objet Professeur à partir de son identifiant
//   fournit la valeur null si le paramètre n'existe pas ou est incorrect

// getEleve($unLogin) : Eleve
//   recherche et fournit un objet Eleve à partir de son identifiant
//   fournit la valeur null si le paramètre n'existe pas ou est incorrect

// getTypeUtilisateur($unLogin, $unMdp) : Chaine
//   permet d'authentifier un utilisateur ; retourne 'inconnu' ou 'administrateur' ou 'professeur' ou 'eleve'



// certaines méthodes nécessitent les fichiers suivants :
include_once ('Administrateur.class.php');


// inclusion des paramètres de l'application
include_once ('parametres.localhost.php');

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
	

	// fournit un objet Administrateur à partir de son identifiant
	// fournit la valeur null si l'id n'existe pas ou est incorrect
	// modifié par Killian BOUTIN le 15/11/2016
	public function getAdministrateur($unLogin)
	{	// préparation de la requete de recherche
	$txt_req = "SELECT * FROM inp_administrateurs WHERE login = :login";
	
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
	else{	// création d'un objet Administrateur
			$id = utf8_encode($uneLigne->id);
			$login = utf8_encode($uneLigne->login);
			$mdp = utf8_encode($uneLigne->mdp);
				
			$unAdministrateur = new Administrateur($id, $login, $mdp);
			return $unAdministrateur;
		}
	}
	
	
	// fournit le type d'un utilisateur identifié par $adrMail et $motDePasse
	// renvoie "eleve" ou "administrateur" ou "professeur" si authentification correcte, "inconnu" sinon
	// modifié par Killian BOUTIN le 15/11/2016
	public function getTypeUtilisateur($unLogin, $unMdp)
	{	// préparation de la requête de recherche dans la table inp_administrateurs
	$txt_req = "SELECT count(*) FROM inp_administrateurs WHERE login = :login AND mdp = :mdp";
	$req = $this->cnx->prepare($txt_req);
	// liaison de la requête et de ses paramètres
	$req->bindValue("login", $unLogin, PDO::PARAM_STR);
	$req->bindValue("mdp", sha1($unMdp), PDO::PARAM_STR);
	// extraction des données et comptage des réponses
	$req->execute();
	$nbReponses = $req->fetchColumn(0);
	// libère les ressources du jeu de données
	$req->closeCursor();
	// fourniture de la réponse
	if ($nbReponses == 1) return "administrateur";
	
	// préparation de la requête de recherche dans la table inp_professeurs
	$txt_req = "SELECT count(*) FROM inp_professeurs WHERE login = :login AND mdp = :mdp";
	$req = $this->cnx->prepare($txt_req);
	// liaison de la requête et de ses paramètres
	$req->bindValue("login", $unLogin, PDO::PARAM_STR);
	$req->bindValue("mdp", sha1($unMdp), PDO::PARAM_STR);
	// extraction des données et comptage des réponses
	$req->execute();
	$nbReponses = $req->fetchColumn(0);
	// libère les ressources du jeu de données
	$req->closeCursor();
	// fourniture de la réponse
	if ($nbReponses == 1) return "professeur";
	
	// préparation de la requête de recherche dans la table inp_eleves
	$txt_req = "SELECT count(*) FROM inp_eleves WHERE login = :login AND mdp = :mdp";
	$req = $this->cnx->prepare($txt_req);
	// liaison de la requête et de ses paramètres
	$req->bindValue("login", $unLogin, PDO::PARAM_STR);
	$req->bindValue("mdp", sha1($unMdp), PDO::PARAM_STR);
	// extraction des données et comptage des réponses
	$req->execute();
	$nbReponses = $req->fetchColumn(0);
	// libère les ressources du jeu de données
	$req->closeCursor();
	// fourniture de la réponse
	if ($nbReponses == 1) return "eleve";
	
	// si on arrive ici, c'est que l'authentification est incorrecte
	return "inconnu";
	}
	
	
	
	
}