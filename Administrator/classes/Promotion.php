<?php
class Promotion{
	//attributs
	protected $IDProduit;
	protected $TauxDeProm;
	protected $DateDebut;
	protected $DateFin;
	protected $Description;
	//constructeur
	function __construct($IDProduit,$TauxDeProm,$DateDebut,$DateFin,$Description){
		$this->IDProduit=$IDProduit;
		$this->TauxDeProm=$TauxDeProm;
		$this->DateDebut=$DateDebut;
		$this->DateFin=$DateFin;
		$this->Description=$Description;
	}
	function getID(){
		return $this->IDProduit;
	}
	function getTauxDeProm(){
		return $this->TauxDeProm;
	}
	function getDateDebut(){
		return $this->DateDebut;
	}
	function getDateFin(){
		return $this->DateFin;
	}
	function getDescription(){
		return $this->Description;
	}
}


?>