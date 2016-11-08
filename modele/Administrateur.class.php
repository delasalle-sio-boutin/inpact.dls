<?php
// Projet : DLS - BTS Info - Anciens élèves
// fichier : modele/Administrateur.class.php
// Rôle : la classe Administrateur représente les administrateurs de l'application
// Création : 08/11/2016 par Killian BOUTIN

// inclusion de la classe Outils
include_once ('Outils.class.php');

class Administrateur
{
	// ------------------------------------------------------------------------------------------------------
	// ---------------------------------- Membres privés de la classe ---------------------------------------
	// ------------------------------------------------------------------------------------------------------
	
	private $id;				// identifiant de l'administrateur
	private $login;				// login de l'administrateur
	private $mdp;				// mot de passe (hashé en SHA1 dans la BDD)
	
	// ------------------------------------------------------------------------------------------------------
	// ----------------------------------------- Constructeur -----------------------------------------------
	// ------------------------------------------------------------------------------------------------------
	
	public function Administrateur($unId, $unLogin, $unMdp) {
		$this->id = $unId;
		$this->login = $unLogin;
		$this->mdp = $unMdp;
	}

	// ------------------------------------------------------------------------------------------------------
	// ---------------------------------------- Getters et Setters ------------------------------------------
	// ------------------------------------------------------------------------------------------------------
	
	public function getId()	{return $this->id;}
	public function setId($unId) {$this->id = $unId;}

	public function getLogin() {return $this->login;}
	public function setLogin($unLogin) {$this->login = $unLogin;}
	
	public function getMdp() {return $this->mdp;}
	public function setMdp($unMdp) {$this->mdp = $unMdp;}

	// ------------------------------------------------------------------------------------------------------
	// -------------------------------------- Méthodes d'instances ------------------------------------------
	// ------------------------------------------------------------------------------------------------------
	
	public function toString() {
		$msg  = 'Administrateur : <br>';
		$msg .= 'id : ' . $this->getId() . '<br>';
		$msg .= 'login : ' . $this->getLogin() . '<br>';
		$msg .= 'mdp : ' . $this->getMdp() . '<br>';
		
		return $msg;
	}
		
} // fin de la classe Administrateur

// ATTENTION : on ne met pas de balise de fin de script pour ne pas prendre le risque
// d'enregistrer d'espaces après la balise de fin de script !!!!!!!!!!!!