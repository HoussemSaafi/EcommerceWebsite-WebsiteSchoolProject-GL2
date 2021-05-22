<?php

class Categorie
{
	private $DesignationCat;
	private $Description;


	function __construct($DesignationCat,$Description)
	{

		$this->DesignationCat=$DesignationCat;
		$this->Description=$Description;

	}


	function getDesignationCat(){
		return $this->DesignationCat;
		
	}
	function getDescription(){
		return $this->Description;
		
	}

}
?>