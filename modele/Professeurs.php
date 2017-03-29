
<?php
// Projet : DLS INPACT
// fichier : modele/Professeurs.class.php
// Rôle : la classe Professeurs représente les Professeurs
// Création : 04/12/2016 par Tony BRAY

class Professeur{
	// ------------------------------------------------------------------------------------------------------
	// ---------------------------------- Membres privés de la classe ---------------------------------------
	// ------------------------------------------------------------------------------------------------------
	private $id; // identifiant de l'utilisateurs
	private $nom; // nom du prof
	private $civilite; // civilité du prof
	
	public function Professeur($unId, $unNom, $uneCivilite) {
		$this->id = $unId;
		$this->nom = $unNom;
		$this->civilite = $uneCivilite;
		
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
	
	public function getNom(){
		return $this->nom;
	}
	
	public function setNom($nom){
		$this->nom = $nom;
	}
	
	public function getCivilite(){
		return $this->civilite;
	}
	
	public function setCivilite($civilite){
		$this->civilite = $civilite;
	}
	
	
}