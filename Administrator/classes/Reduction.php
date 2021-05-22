<?php
class Reduction{
	//attributs
	protected $IDReduction;
	protected $Titre;
	protected $TauxReduction;
	protected $DateDebut;
	protected $DateFin;
	protected $MontantMin;
	//constructeur
	function __construct($IDReduction,$Titre,$TauxReduction,$DateDebut,$DateFin,$MontantMin){
		$this->IDReduction=$IDReduction;
		$this->Titre=$Titre;
		$this->TauxReduction=$TauxReduction;
		$this->DateDebut=$DateDebut;
		$this->DateFin=$DateFin;
		$this->MontantMin=$MontantMin;
	}
	function getID(){
		return $this->IDReduction;
	}
	function getTitre(){
		return $this->Titre;
	}
	function getTauxReduction(){
		return $this->TauxReduction;
	}
	function getDateDebut(){
		return $this->DateDebut;
	}
	function getDateFin(){
		return $this->DateFin;
	}
	function getMontantMin(){
		return $this->MontantMin;
	}
}


?>