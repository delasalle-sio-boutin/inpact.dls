<?php
// Projet : DLS - BTS Info - Anciens élèves
// fichier : modele/Message.class.php
// Rôle : la classe Message représente les messages envoyés et reçus des utilisateurs
// Création : 23/11/2016 par Killian BOUTIN

// inclusion de la classe Outils
include_once ('Outils.class.php');

class Message
{
	// ------------------------------------------------------------------------------------------------------
	// ---------------------------------- Membres privés de la classe ---------------------------------------
	// ------------------------------------------------------------------------------------------------------
	
	private $id;				// id du message
	private $idFrom;			// from
	private $idTo;				// to
	private $dateMessage;		// date du message
	private $titre; 			// titre
	private $contenu;			// contenu
	private $lu; 				// 0 si non lu, 1 si lu
	
	// ------------------------------------------------------------------------------------------------------
	// ----------------------------------------- Constructeur -----------------------------------------------
	// ------------------------------------------------------------------------------------------------------
	
	public function Message($unId, $unIdFrom, $unIdTo, $uneDateMessage, $unTitre, $unContenu, $unLu) {
		$this->id = $unId;
		$this->idFrom = $unIdFrom;
		$this->idTo = $unIdTo;
		$this->dateMessage = $uneDateMessage;
		$this->titre = $unTitre;
		$this->contenu = $unContenu;
		$this->lu = $unLu;
	}

	// ------------------------------------------------------------------------------------------------------
	// ---------------------------------------- Getters et Setters ------------------------------------------
	// ------------------------------------------------------------------------------------------------------
	
	public function getId()	{return $this->id;}
	public function setId($unId) {$this->id = $unId;}
	
	public function getIdFrom()	{return $this->idFrom;}
	public function setIdFrom($unIdFrom) {$this->idFrom = $unIdFrom;}
	
	public function getIdTo()	{return $this->idTo;}
	public function setIdTo($unIdTo) {$this->idTo = $unIdTo;}
	
	public function getDateMessage()	{return $this->dateMessage;}
	public function setDateMessage($uneDateMessage) {$this->dateMessage = $uneDateMessage;}	

	public function getTitre() {return $this->titre;}
	public function setTitre($unTitre) {$this->titre = $unTitre;}
	
	public function getContenu() {return $this->contenu;}
	public function setContenu($unContenu) {$this->contenu = $unContenu;}
	
	public function getLu() {return $this->lu;}
	public function setLu($unLu) {$this->lu = $unLu;}

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
		$msg .= 'lu : ' . $this->getLu() . '<br>';
		
		return $msg;
	}
		
} // fin de la classe Administrateur

// ATTENTION : on ne met pas de balise de fin de script pour ne pas prendre le risque
// d'enregistrer d'espaces après la balise de fin de script !!!!!!!!!!!!