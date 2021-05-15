<?php
//Pour insérer un chauffeur dans la base de données, une classe contenant les crud est crée
//en instanciant un objet de cette classe, la cnx avec la base de données est établie 
include_once '../autoload.php';
class crudProduit{
	public $conn;
    function __construct()
    {
        $this->conn= ConnexionBD::getInstance();
    }


	function insertProduit($p,$conn)
	{
		$req1="INSERT INTO produit (Ref,Designation,PrixHT,TVA,Quantite,QuantiteMin,Description,ID_Categorie,ImgProduit) 
		VALUES (".$p->getRef().",'".$p->getDesignation()."','".$p->getPrixHT()."',".$p->getTVA().",'".$p->getQuantite()."',
		'".$p->getQuantiteMin()."','".$p->getDescription()."','".$p->getID_Categorie()."','".$p->getImgProduit()."')";
		var_dump($req1);
		return $conn->query($req1);

	}

		function modifierProduit($p,$conn)
	{
		$req1="UPDATE produit SET Designation='".$p->getDesignation()."', PrixHT=".$p->getPrixHT().",TVA=".$p->getTVA().",Quantite=".$p->getQuantite().",QuantiteMin=".$p->getQuantiteMin().",Description='".$p->getDescription()."',ID_Categorie=".$p->getID_Categorie()." WHERE Ref=".$p->getRef();
        $response =$this->conn->prepare($req1);
        $response->execute([]);
        var_dump($req1);
		return $conn->query($req1);

	}
	

	function afficheProduit($conn)
	{
		$req="SELECT * FROM produit";
        $response =$this->conn->prepare($req);
		 $response->execute([]);
        return $response->fetchAll(PDO::FETCH_OBJ);
	}

    function getProduit($id)
    {
        $req="SELECT * FROM produit where Ref=".$id;
        $response =$this->conn->prepare($req);
        $response->execute([$id]);
        return $response->fetch(PDO::FETCH_ASSOC);
    }

	function supprimerProduit($id,$conn)
    {
        $req = "DELETE from produit WHERE Ref=" . $id;
        $response =$this->conn->prepare($req);
        $response->execute([]);
        return $conn->query($req);
    }

}

?>