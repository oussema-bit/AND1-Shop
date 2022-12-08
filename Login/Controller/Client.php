<?php
	class Client{
        //Attributes
		private $id=null;
		private $nom=null;
		private $prenom=null;
		private $pwd=null;
		private $email=null;
        private $img=null;
		private $date_naissance=null;
		//Constructors
		function __construct($nom, $prenom, $pwd, $email,$date_naissance,$img){
			$this->nom=$nom;
			$this->prenom=$prenom;
			$this->pwd=$pwd;
			$this->email=$email;
            $this->img=$img;
			$this->date_naissance=$date_naissance;
		}
        //Getters
		function getid(){
			return $this->id;
		}
	
		function getNom(){
			return $this->nom;
		}
		function getPrenom(){
			return $this->prenom;
		}
		function getpwd(){
			return $this->pwd;
		}
		function getEmail(){
			return $this->email;
		}
		
     
        function getimg(){
			return $this->img;
		}
		function getdate_naissance(){
			return $this->date_naissance;
		}
        //Setters
		function setNom(string $nom){
			$this->nom=$nom;
		}
		
		function setPrenom(string $prenom){
			$this->prenom=$prenom;
		}
		function setpwd(string $pwd){
			$this->pwd=$pwd;
		}
		function setEmail(string $email){
			$this->email=$email;
		}
		function setimg(string $img){
			$this->img=$img;
		}
      
        function setid(string $id){
			$this->id=$id;
		}
		function setdate_naissance(string $date_naissance){
			$this->date_naissance=$date_naissance;
		}
		
	}
?>