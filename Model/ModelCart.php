<?php
	class Commande{
        //Attributes
		private $id=null;
		private $clinet_id=null;
		private $descrp=null;
		private $price=null;
		//Constructors
		function __construct($clinet_id, $descrp, $price){
			$this->clinet_id=$clinet_id;
			$this->descrp=$descrp;
			$this->price=$price;
		}
        //Getters
		function getid(){
			return $this->id;
		}
		function getdescrp(){
			return $this->descrp;
		}
		function getclinet_id(){
			return $this->clinet_id;
		}
		function getprice(){
			return $this->price;
		}
		
        //Setters
		function setNom(string $nom){
			$this->nom=$nom;
		}
		function setdescrp(string $descrp){
			$this->descrp=$descrp;
		}
		function setprice(string $price){
			$this->price=$price;
		}
		function setclinet_id(string $clinet_id){
			$this->clinet_id=$clinet_id;
		}
	}
?>