<?php
class chambre{
	private $num_chambre;
	private $typeChambre;
    private $description; 
	
	
	function __construct($numChambre,$typeChambre,$description){
		$this->numChambre=$numChambre;
		$this->typeChambre=$typeChambre;
		$this->description=$description;
		
    }
	function getNumChambre(){
		return $this->numChambre;
	}	
	function getTypeChambre(){
		return $this->typeChambre;
	}
    function getDescription(){
		return $this->description;
	}
}