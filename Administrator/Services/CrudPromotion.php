<?php

include_once '../autoload.php';
class CrudPromotion{
	public $conn;
	function __construct()
	{
        $this->conn=ConnexionBD::getInstance();
	}
	function insertPromotion($Prom,$conn){
		
		$req="INSERT INTO promotion (IDProduit,TauxDeProm,DateDebut,DateFin,Description) 
		VALUES (".$Prom->getID().",'".$Prom->getTauxDeProm()."','".$Prom->getDateDebut().
		"','".$Prom->getDateFin()."','".$Prom->getDescription()."')";
		$conn->query($req);	
	}
	function affichePromotion($conn){
        $req="SELECT * FROM promotion";
        $response= $this->conn->prepare($req);
        $response->execute([]);
        return $response->fetchAll(PDO::FETCH_OBJ);
	}
        function afficheIDPromotion($conn){
		$req="SELECT IDProduit FROM produit p WHERE NOT EXISTS ( SELECT null FROM promotion d WHERE d.IDProduit = p.IDProduit )";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
		
	}
	function recupererPromotion($ID,$conn){
		
		$req="SELECT * FROM promotion  WHERE IDProduit=".$ID;
		$liste=$conn->query($req);
		return $liste->fetchAll();
	}
	function modifierPromotion($Prom,$conn){
		$req="UPDATE promotion SET  TauxDeProm='".$Prom->getTauxDeProm()."',DateDebut='".$Prom->getDateDebut()."',DateFin='".$Prom->getDateFin()."' ,Description='".$Prom->getDescription()."' WHERE IDProduit=".$Prom->getID();
		
		$conn->exec($req);
	}
	function supprimerPromotion($ID,$conn){
		$req="DELETE FROM promotion where IDProduit=".$ID;
		var_dump($req);
		$conn->exec($req);
	}

	function updateTable($conn){
		$req="DELETE FROM promotion where DateFin < CURDATE()";
		$conn->exec($req);
	}
		function recherchePromotion($ID,$conn){
		$req="SELECT IDProduit,TauxDeProm,DateDebut,DateFin,Description FROM Promotion where IDProduit  Like '$ID%' or TauxDeProm Like '$ID%'";
		$liste=$conn->query($req);
		return $liste->fetchAll();
	}
	//$IDlive=$_POST['liveSearch'];
	function rechercheDynamic($IDlive,$conn){
		$req="SELECT IDProduit,TauxDeProm,DateDebut,DateFin,Description FROM Promotion where IDProduit Like '%$IDlive%'";
		$liste=$conn->query($req);
		return $liste->fetchAll();
	}

	function clientEmail($conn){
		$req="SELECT Email FROM users ";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
	}
}

?>