<?php
// Projet : DLS - BTS Info - Anciens élèves
// fichier : modele/Evenement.class.php
// Rôle : la classe Evenement représente les évènements de l'association
// Création : 23/11/2016 par Killian BOUTIN

// inclusion de la classe Outils
include_once ('Outils.class.php');

class Evenement
{
	// ------------------------------------------------------------------------------------------------------
	// ---------------------------------- Membres privés de la classe ---------------------------------------
	// ------------------------------------------------------------------------------------------------------
	
	private $id;				// identifiant de l'administrateur
	private $titre;				// titre de l'évènement
	private $contenu;			// contenu de l'évènement
	
	// ------------------------------------------------------------------------------------------------------
	// ----------------------------------------- Constructeur -----------------------------------------------
	// ------------------------------------------------------------------------------------------------------
	
	public function Evenement($unId, $unTitre, $unContenu) {
		$this->id = $unId;
		$this->titre = $unTitre;
		$this->contenu = $unContenu;
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

	// ------------------------------------------------------------------------------------------------------
	// -------------------------------------- Méthodes d'instances ------------------------------------------
	// ------------------------------------------------------------------------------------------------------
	
	public function toString() {
		$msg  = 'Evenement : <br>';
		$msg .= 'id : ' . $this->getId() . '<br>';
		$msg .= 'titre : ' . $this->getTitre() . '<br>';
		$msg .= 'contenu : ' . $this->getContenu() . '<br>';
		
		return $msg;
	}
		
} // fin de la classe Administrateur

// ATTENTION : on ne met pas de balise de fin de script pour ne pas prendre le risque
// d'enregistrer d'espaces après la balise de fin de script !!!!!!!!!!!!