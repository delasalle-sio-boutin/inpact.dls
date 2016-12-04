<?php
// Projet : DLS INPACT
// fichier : modele/Eleves.class.php
// Rôle : la classe Eleve représente les eleves de l'application
// Création : 04/12/2016 par Tony BRAY

// inclusion de la classe Outils
include_once ('Outils.class.php');
class Eleve {
	// ------------------------------------------------------------------------------------------------------
	// ---------------------------------- Membres privés de la classe ---------------------------------------
	// ------------------------------------------------------------------------------------------------------
	private $id; // identifiant de l'eleve
	private $login; // login de l'eleve
	private $mdp; // mot de passe (hashé en SHA1 dans la BDD)
	private $classe; // classe de l'eleve
	private $nom; // nom de l'eleve
	private $prenom; // prenom de l'eleve
	private $mail; // mail de l'eleve
	private $dateNaissance; // date de naissance de l'eleve
	                        
	// ------------------------------------------------------------------------------------------------------
	                        // ----------------------------------------- Constructeur -----------------------------------------------
	                        // ------------------------------------------------------------------------------------------------------
	public function Eleve($unId, $unLogin, $unMdp, $uneClasse, $unNom, $unPrenom, $unMail, $uneDateNaissance) {
		$this->id = $unId;
		$this->login = $unLogin;
		$this->mdp = $unMdp;
		$this->classe = $uneClasse;
		$this->nom = $unNom;
		$this->prenom = $unPrenom;
		$this->mail = $unMail;
		$this->dateNaissance = $uneDateNaissance;
	}
	
	// ------------------------------------------------------------------------------------------------------
	// ---------------------------------------- Getters et Setters ------------------------------------------
	// ------------------------------------------------------------------------------------------------------
	public function getId() {
		return $this->id;
	}
	public function setId($unId) {
		$this->id = $unId;
	}
	public function getLogin() {
		return $this->login;
	}
	public function setLogin($unLogin) {
		$this->login = $unLogin;
	}
	public function getMdp() {
		return $this->mdp;
	}
	public function setMdp($unMdp) {
		$this->mdp = $unMdp;
	}
	public function getClasse() {
		return $this->classe;
	}
	public function setClasse($uneClasse) {
		$this->classe = $uneClasse;
	}
	public function getNom() {
		return $this->nom;
	}
	public function setNom($unNom) {
		$this->nom = $unNom;
	}
	public function getPrenom() {
		return $this->prenom;
	}
	public function setPrenom($unPrenom) {
		$this->prenom = $unPrenom;
	}
	public function getMail() {
		return $this->mail;
	}
	public function setMail($unMail) {
		$this->mail = $unMail;
	}
	public function getDateNaissance() {
		return $this->dateNaissance;
	}
	public function setDateNaissance($uneDateNaissance) {
		$this->dateNaissance = $uneDateNaissance;
	}
	
	// ------------------------------------------------------------------------------------------------------
	// -------------------------------------- Méthodes d'instances ------------------------------------------
	// ------------------------------------------------------------------------------------------------------
	
	public function toString() {
		$msg  = 'Eleve : <br>';
		$msg .= 'id : ' . $this->getId() . '<br>';
		$msg .= 'login : ' . $this->getLogin() . '<br>';
		$msg .= 'mdp : ' . $this->getMdp() . '<br>';
		$msg .= 'nom : ' . $this->getNom() . '<br>';
		$msg .= 'prenom : ' . $this->getPrenom() . '<br>';
		$msg .= 'mail : ' . $this->getMail() . '<br>';
		$msg .= 'date de naissance : ' . $this->getDateNaissance() . '<br>';
		
	
		return $msg;
	}
	
	
}