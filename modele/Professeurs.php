
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

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getCivilite()
    {
        return $this->civilite;
    }

    /**
     * @param mixed $civilite
     */
    public function setCivilite($civilite)
    {
        $this->civilite = $civilite;
    }
	// ------------------------------------------------------------------------------------------------------
	// ---------------------------------------- Getters et Setters ------------------------------------------
	// ------------------------------------------------------------------------------------------------------
	

	
	
}