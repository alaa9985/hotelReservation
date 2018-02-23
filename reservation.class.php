<?php
class reservation{
	private $id; 
    private $num_chambre;
	private $check_in; 
    private $check_out; 
    private $id_client; 
	
	
	function __construct($id,$numChambre,$check_in,$check_out,$id_client){
		$this->id=$id;
        $this->numChambre=$numChambre;
		$this->check_in=$check_in;
		$this->check_out=$check_out;
        $this->id_client=$id_client; 
    }
	
    function getID(){
		return $this->id;
	}	
	function getNumChambre(){
		return $this->numChambre;
	}	
	function getCheckIn(){
		return $this->check_in;
	}
    function getCheckOut(){
		return $this->check_out;
	}
    function getClient(){
		return $this->id_client;
	}
}