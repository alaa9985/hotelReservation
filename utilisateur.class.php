<?php
class utilisateur{
	private $nom;
	private $prenom;
    private $dateNaissance;
    private $sexe; 
    private $pays; 
    private $adresse;  
	private $pseudo;
	private $motDePasse;
	private $adresseMail;
	
	
	
	function __construct($surname,$name, $date,$sexe,$adresse, $pays, $username,$passe,$email){
		$this->nom=$surname;
		$this->prenom=$name;
		$this->dateNaissance=$date;
		$this->sexe=$sexe;
		$this->adresse=$adresse;
		$this->pays=$pays;
		$this->pseudo=$username;
		$this->motDePasse=sha1($passe);
		$this->adresseMail=$email;
		;

		
	}
	
	function getNom(){
		return $this->nom;
	}
	
	function getPrenom(){
		return $this->prenom;
	}
    function getDateNaissance(){
		return $this->dateNaissance;
	}
    function getSexe(){
		return $this->sexe;
	}
    function getAdresse(){
		return $this->adresse;
	}
    function getPays(){
		return $this->pays;
	}
    
	function getPseudo(){
		return $this->pseudo;
	}
	function getPasse(){
		return $this->motDePasse;
	}	
	function getEmail(){
		return $this->adresseMail;
	}
    function getPreferences(){
		return $this->preferences;
	}
}