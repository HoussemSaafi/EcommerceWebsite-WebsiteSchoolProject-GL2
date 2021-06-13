<?php

class Produit
{
	private $Ref;
	private $Designation;
	private $PrixHT;
	private $TVA;
	private $Description;
	private $Quantite;
	private $QuantiteMin;
	private $ImgProduit;
	private $ID_Categorie;


	function __construct($Ref,$Designation,$PrixHT,$TVA,$Description,$Quantite,$QuantiteMin,$ImgProduit,$ID_Categorie)
	{

		$this->Ref=$Ref;
		$this->$Designation=$Designation;
		$this->PrixHT=$PrixHT;
		$this->TVA=0.05;
		$this->Description=$Description;
		$this->Quantite=$Quantite;
		$this->QuantiteMin=$QuantiteMin;
		$this->ImgProduit=$ImgProduit;
		$this->ID_Categorie=$ID_Categorie;
	}

    /**
     * @return mixed
     */
    public function getDesignation()
    {
        return $this->Designation;
    }

    /**
     * @param mixed $Designation
     */
    public function setDesignation($Designation)
    {
        $this->Designation = $Designation;
    }

    /**
     * @param mixed $ID_Categorie
     */
    public function setIDCategorie($ID_Categorie)
    {
        $this->ID_Categorie = $ID_Categorie;
    }

    /**
     * @param mixed $ImgProduit
     */
    public function setImgProduit($ImgProduit)
    {
        $this->ImgProduit = $ImgProduit;
    }


	function getRef(){
		return $this->Ref;
		
	}
		
	function getPrixHT(){
		return $this->PrixHT;
		
	}
		
	function getTVA(){
		return $this->TVA;
		
	}
		
	function getDescription(){
		return $this->Description;
		
	}

	function getID_Categorie(){
		return $this->ID_Categorie;
		
	}

	function getQuantite(){
		return $this->Quantite;
		
	}

	function getQuantiteMin(){
		return $this->QuantiteMin;
		
	}

	function getImgProduit(){
		return $this->ImgProduit;
		
	}

}
?>