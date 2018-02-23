<?php
class event{
	private $idEvent;
	private $typeEvent;
    private $dateEvent; 
    private $heureEvent; 
    private $lieuEvent; 
    private $description; 
	
	
	function __construct($typeEvent,$dateEvent,$heureEvent,$lieuEvent,$description){
		$this->typeEvent=$typeEvent;
		$this->dateEvent=$dateEvent;
		$this->heureEvent=$heureEvent;
		$this->lieuEvent=$lieuEvent;
		$this->description=$description;
		
    }
	function getNumEvent(){
		return $this->idEvent;
	}	
	function getTypeEvent(){
		return $this->typeEvent;
	}
    function getLieuEvent(){
		return $this->lieuEvent;
	}
    function getDateEvent(){
		return $this->dateEvent;
	}
    function getHeureEvent(){
		return $this->heureEvent;
	}
    function getDescription(){
		return $this->description;
	}
}