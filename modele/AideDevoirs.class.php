<?php
// Projet : DLS - BTS Info - Anciens élèves
// fichier : modele/AideDevoirs.class.php
// Rôle : la classe AideDevoirs représentent les enregistremnt des aide au devoirs
// Création : 03/03/2017 par Sophie Audigou

// inclusion de la classe Outils
include_once ('Outils.class.php');
class AideDevoirs
{
	// ------------------------------------------------------------------------------------------------------
	// ---------------------------------- Membres privés de la classe ---------------------------------------
	// ------------------------------------------------------------------------------------------------------

	private $id;				// identifiant de l'administrateur
	private $nom;				// titre de l'évènement
	private $contenu;			// contenu de l'évènement
	private $dateCreation;		// date de création de l'article
	private $dateEvenement;		// date de l'évènement

	// ------------------------------------------------------------------------------------------------------
	// ----------------------------------------- Constructeur -----------------------------------------------
	// ------------------------------------------------------------------------------------------------------

	public function AideDevoirs($unId, $unTitre, $unContenu, $uneDateCreation, $uneDateEvenement) {
		$this->id = $unId;
		$this->titre = $unTitre;
		$this->contenu = $unContenu;
		$this->dateCreation = $uneDateCreation;
		$this->dateEvenement = $uneDateEvenement;
	}

	// ------------------------------------------------------------------------------------------------------
	// ---------------------------------------- Getters et Setters ------------------------------------------
	// ------------------------------------------------------------------------------------------------------

	public function getId()	{return $this->id;}
	public function setId($unId) {$this->id = $unId;}

	public function getTitre() {return $this->titre;}
	public function setTitre($unTitre) {$this->titre = $unTitre;}

	public function getContenu() {return $this->contenu;}
	public function setContenu($unContenu) {$this->contenu = $unContenu;}

	public function getDateCreation() {return $this->dateCreation;}
	public function setDateCreation($uneDateCreation) {$this->dateCreation = $uneDateCreation;}

	public function getDateEvenement() {return $this->dateEvenement;}
	public function setDateEvenement($uneDateEvenement) {$this->dateEvenement = $uneDateEvenement;}

	// ------------------------------------------------------------------------------------------------------
	// -------------------------------------- Méthodes d'instances ------------------------------------------
	// ------------------------------------------------------------------------------------------------------

	public function toString() {
		$msg  = 'Evenement : <br>';
		$msg .= 'id : ' . $this->getId() . '<br>';
		$msg .= 'titre : ' . $this->getTitre() . '<br>';
		$msg .= 'contenu : ' . $this->getContenu() . '<br>';
		$msg .= 'date création : ' . $this->getDateCreation() . '<br>';
		$msg .= 'date évènement : ' . $this->getDateEvenement() . '<br>';

		return $msg;
	}

}
?>