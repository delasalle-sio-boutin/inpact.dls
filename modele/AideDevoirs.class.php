<?php
// Projet : DLS - BTS Info - Anciens élèves
// fichier : modele/AideDevoirs.class.php
// Rôle : la classe AideDevoirs représentent les enregistremnt des aide au devoirs
// Création : 24/03/2017 par Sophie Audigou

// inclusion de la classe Outils
include_once ('Outils.class.php');
class AideDevoirs
{
	// ------------------------------------------------------------------------------------------------------
	// ---------------------------------- Membres privés de la classe ---------------------------------------
	// ------------------------------------------------------------------------------------------------------

	private $id;				// identifiant de l'aide
	private $nom;				// titre de l'aide
	private $contenu;			// contenu de l'aide
	private $dateCreation;		// date de création de l'article
	private $idUtilisateur;		// identifiant du demandeur

	// ------------------------------------------------------------------------------------------------------
	// ----------------------------------------- Constructeur -----------------------------------------------
	// ------------------------------------------------------------------------------------------------------

	public function AideDevoirs($unId, $unTitre, $unContenu, $uneDateCreation, $unIdUtilisateur) {
		$this->id = $unId;
		$this->titre = $unTitre;
		$this->contenu = $unContenu;
		$this->dateCreation = $uneDateCreation;
		$this->unIdUtilisateur = $unIdUtilisateur;
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

	public function getIdUtilisateur() {return $this->idUtilisateur;}
	public function setIdUtilisateur($unIdUtilisateur) {$this->IdUtilisateur = $unIdUtilisateur;}

	// ------------------------------------------------------------------------------------------------------
	// -------------------------------------- Méthodes d'instances ------------------------------------------
	// ------------------------------------------------------------------------------------------------------

	public function toString() {
		$msg  = 'Aide devoirs : <br>';
		$msg .= 'id : ' . $this->getId() . '<br>';
		$msg .= 'titre : ' . $this->getTitre() . '<br>';
		$msg .= 'contenu : ' . $this->getContenu() . '<br>';
		$msg .= 'date création : ' . $this->getDateCreation() . '<br>';
		$msg .= 'idUtilisateur : ' . $this->getIdUtilisateur() . '<br>';

		return $msg;
	}
	
	/*public function getPrenomUtilisateur($idUtilisateur) {
		$req = $dao->SELECT prenom from inp_utilisateur where id = :id;
		
	}*/

}

class ReponseAideDevoirs{
	// ------------------------------------------------------------------------------------------------------
	// ---------------------------------- Membres privés de la classe ---------------------------------------
	// ------------------------------------------------------------------------------------------------------
	
	private $idUtilisateur;		// identifiant de l'utilisateur qui donne la reponse
	private $idAideDevoir;		// identifiant de l'aideDevoirs
	private $reponse;			// contenu de l'évènement
	private $dateCreation;		// date de création de l'article
	
	// ------------------------------------------------------------------------------------------------------
	// ----------------------------------------- Constructeur -----------------------------------------------
	// ------------------------------------------------------------------------------------------------------
	
	public function ReponseAideDevoirs($unIdUtilisateur,$unIdAideDevoir, $unTitre, $unContenu, $uneDateCreation) {
		$this->idUtilisateur = $unIdUtilisateur;
		$this->idAideDevoir = $unIdAideDevoir;
		$this->reponse = $uneReponse;
		$this->dateCreation = $uneDateCreation;
	}
	
	// ------------------------------------------------------------------------------------------------------
	// ---------------------------------------- Getters et Setters ------------------------------------------
	// ------------------------------------------------------------------------------------------------------
	
	public function getIdUtilisateur() {return $this->idUtilisateur;}
	public function setIdUtilisateur($unIdUtilisateur) {$this->IdUtilisateur = $unIdUtilisateur;}
	
	public function getIdAideDevoir()	{return $this->idAideDevoir;}
	public function setIdAideDevoir($unIdAideDevoir) {$this->idAideDevoir = $unIdAideDevoir;}

	public function getReponse() {return $this->reponse;}
	public function setReponse($uneReponse) {$this->reponse = $uneReponse;}
	
	public function getDateCreation() {return $this->dateCreation;}
	public function setDateCreation($uneDateCreation) {$this->dateCreation = $uneDateCreation;}
	
	
	
	// ------------------------------------------------------------------------------------------------------
	// -------------------------------------- Méthodes d'instances ------------------------------------------
	// ------------------------------------------------------------------------------------------------------
	
	public function toString() {
		$msg  = 'Reponse à l\'Aide aux devoirs : <br>';
		$msg .= 'id l\'utilisateur : ' . $this->getIdUtilisateur() . '<br>';
		$msg .= 'id l\'aide au devoir : ' . $this->getIdAideDevoir() . '<br>';
		$msg .= 'reponse : ' . $this->getReponse() . '<br>';
		$msg .= 'date création : ' . $this->getDateCreation() . '<br>';
	
		return $msg;
	}
	
	/*public function getPrenomUtilisateur($idUtilisateur) {
	 $req = $dao->SELECT prenom from inp_utilisateur where id = :id;
	
	 }*/
	
}
?>