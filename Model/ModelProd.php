<?php
	class Prod{
        //Attributes
		private $id=null;
		private $Name=null;
		private $Cover_Name=null;
		private $price=null;
		private $backimg=null;
		private $frontimg;
        private $color_front;
        private $color_back=null;
		//Constructors
		function __construct($Name, $Cover_Name, $price, $backimg, $frontimg,$color_front,$color_back){
			$this->Name=$Name;
			$this->Cover_Name=$Cover_Name;
			$this->price=$price;
			$this->backimg=$backimg;
			$this->color_front=$color_front;
            $this->frontimg=$frontimg;
            $this->img=$img;
			$this->color_back=$color_back;
		}
        //Getters
		function getid(){
			return $this->id;
		}
		function getName(){
			return $this->Name;
		}
		function getCover_Name(){
			return $this->Cover_Name;
		}
		function getprice(){
			return $this->price;
		}
		function getbackimg(){
			return $this->backimg;
		}
		function getfrontimg(){
			return $this->frontimg;
		}
        function getcolor_front(){
			return $this->color_front;
		}
		function getcolor_back(){
			return $this->color_back;
		}
        //Setters
		function setNom(string $nom){
			$this->nom=$nom;
		}
		function setCover_Name(string $Cover_Name){
			$this->Cover_Name=$Cover_Name;
		}
		function setprice(string $price){
			$this->price=$price;
		}
		function setbackimg(string $backimg){
			$this->backimg=$backimg;
		}
		function setimg(string $img){
			$this->img=$img;
		}
        function setcolor_front(string $color_front){
			$this->color_front=$color_front;
		}
        function setfrontimg(string $frontimg){
			$this->frontimg=$frontimg;
		}
		function setcolor_back(string $color_back){
			$this->color_back=$color_back;
		}
	}
?>