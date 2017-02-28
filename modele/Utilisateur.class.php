<?php
// Projet : DLS INPACT
// fichier : modele/Utilisateur.class.php
// Rôle : la classe Utilisateur représente les utilisateurs de l'application
// Création : 04/12/2016 par Tony BRAY

// inclusion de la classe Outils
include_once ('Outils.class.php');
class Utilisateur {
	// ------------------------------------------------------------------------------------------------------
	// ---------------------------------- Membres privés de la classe ---------------------------------------
	// ------------------------------------------------------------------------------------------------------
	private $id; // identifiant de l'utilisateurs
	private $login; // login de l'utilisateurs
	private $mdp; // mot de passe (hashé en SHA1 dans la BDD)
	private $niveau; //Niveau de l'utilisateur
	private $nom; // nom de l'utilisateurs
	private $prenom; // prenom de l'utilisateurs
	private $classe; // classe de l'utilisateurs
	private $mail; // mail de l'utilisateurs
	private $dateNaissance; // date de naissance de l'utilisateurs
	private $mailFromProfs;
	private $mailFromEleves;
	                        
	// ------------------------------------------------------------------------------------------------------
	                        // ----------------------------------------- Constructeur -----------------------------------------------
	                        // ------------------------------------------------------------------------------------------------------
	public function Utilisateur($unId, $unLogin, $unMdp, $unNiveau ,$unNom, $unPrenom ,$uneClasse, $unMail, $uneDateNaissance, $unNbMailFromProfs, $unNbMailFromEleves) {
		$this->id = $unId;
		$this->login = $unLogin;
		$this->mdp = $unMdp;
		$this->niveau = $unNiveau;
		$this->nom = $unNom;
		$this->prenom = $unPrenom;
		$this->classe = $uneClasse;
		$this->mail = $unMail;
		$this->dateNaissance = $uneDateNaissance;
		$this->mailFromProfs = $unNbMailFromProfs;
		$this->mailFromEleves = $unNbMailFromEleves;
	}
	
	// ------------------------------------------------------------------------------------------------------
	// ---------------------------------------- Getters et Setters ------------------------------------------
	// ------------------------------------------------------------------------------------------------------
	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getLogin(){
		return $this->login;
	}

	public function setLogin($login){
		$this->login = $login;
	}

	public function getMdp(){
		return $this->mdp;
	}

	public function setMdp($mdp){
		$this->mdp = $mdp;
	}

	public function getNiveau(){
		return $this->niveau;
	}

	public function setNiveau($niveau){
		$this->niveau = $niveau;
	}

	public function getNom(){
		return $this->nom;
	}

	public function setNom($nom){
		$this->nom = $nom;
	}

	public function getPrenom(){
		return $this->prenom;
	}

	public function setPrenom($prenom){
		$this->prenom = $prenom;
	}

	public function getClasse(){
		return $this->classe;
	}

	public function setClasse($classe){
		$this->classe = $classe;
	}

	public function getMail(){
		return $this->mail;
	}

	public function setMail($mail){
		$this->mail = $mail;
	}

	public function getDateNaissance(){
		return $this->dateNaissance;
	}

	public function setDateNaissance($dateNaissance){
		$this->dateNaissance = $dateNaissance;
	}

	public function getMailFromProfs(){
		return $this->mailFromProfs;
	}

	public function setMailFromProfs($mailFromProfs){
		$this->mailFromProfs = $mailFromProfs;
	}

	public function getMailFromEleves(){
		return $this->mailFromEleves;
	}

	public function setMailFromEleves($mailFromEleves){
		$this->mailFromEleves = $mailFromEleves;
	}
	
	// ------------------------------------------------------------------------------------------------------
	// -------------------------------------- Méthodes d'instances ------------------------------------------
	// ------------------------------------------------------------------------------------------------------
	
	public function toString() {
		$msg  = 'Eleve : <br>';
		$msg .= 'id : ' . $this->getId() . '<br>';
		$msg .= 'login : ' . $this->getLogin() . '<br>';
		$msg .= 'mdp : ' . $this->getMdp() . '<br>';
		$msg .= 'niveau : '.$this->getNiveau().'<br>';
		$msg .= 'nom : ' . $this->getNom() . '<br>';
		$msg .= 'prenom : ' . $this->getPrenom() . '<br>';
		$msg .= 'classe : ' . $this->getClasse() . '<br>';
		$msg .= 'mail : ' . $this->getMail() . '<br>';
		$msg .= 'date de naissance : ' . $this->getDateNaissance() . '<br>';
		$msg .= 'msgEleve : '.$this->getMailFromEleves() . '<br>';
		$msg .= 'msgProf : ' . $this->getMailFromProfs() . '<br>';
		
	
		return $msg;
	}
	
	
}