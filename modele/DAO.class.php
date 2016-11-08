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

// getLesFonctions() : array
//   fournit la liste des fonctions que peut occuper un ancien élève ; le résultat est fourni sous forme d'une collection d'objets Fonction



// certaines méthodes nécessitent les fichiers suivants :
include_once ('Administrateur.class.php');


// inclusion des paramètres de l'application
include_once ('../parametres.localhost.php');

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
	// modifié par Jim le 23/11/2015
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
	
}