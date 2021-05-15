<?php
include_once '../classes/ConnexionBD.php';
include_once '../classes/Reduction.php';
class crudReduction{
	public $conn;
	function __construct()
	{
        $this->conn= ConnexionBD::getInstance();
	}
        function insertReduction($Prom,$conn){
            $req="INSERT INTO reduction (Titre,TauxReduction,DateDebut,DateFin,MontantMin) 
		VALUES ('".$Prom->getTitre()."','".$Prom->getTauxReduction()."','".$Prom->getDateDebut().
                "','".$Prom->getDateFin()."','".$Prom->getMontantMin()."')";
            var_dump($req);
            return $conn->query($req);
	}
	function afficheReduction($conn){
        $req="SELECT * FROM reduction";
        $response= $this->conn->prepare($req);
        $response->execute([]);
        return $response->fetchAll(PDO::FETCH_OBJ);
		
	}
        
	function recupererReduction($ID){

		$req="SELECT * FROM reduction WHERE IDReduction=".$ID;
		$liste=$this->conn->query($req);
		return $liste->fetchAll();
	}
	function modifierReduction($Prom,$conn){
		$req="UPDATE reduction SET  Titre='".$Prom->getTitre()."',TauxReduction='".$Prom->getTauxReduction()."',DateDebut='".$Prom->getDateDebut()."',DateFin='".$Prom->getDateFin()."' ,MontantMin='".$Prom->getMontantMin()."' WHERE IDReduction=".$Prom->getID();
		
		$conn->exec($req);
	}
	function supprimerReduction($ID,$conn){
		$req="DELETE FROM reduction where IDReduction=".$ID;
		$conn->exec($req);
	}

	function updateTable($conn){
		$req="DELETE FROM reduction where DateFin < CURDATE() and titre!='default'";
		$conn->exec($req);
	}
		function rechercheReduction($ID,$conn){
		$req="SELECT * FROM reduction where IDReduction=".$ID;
		$liste=$conn->query($req);
		return $liste->fetchAll();
}
}

?>