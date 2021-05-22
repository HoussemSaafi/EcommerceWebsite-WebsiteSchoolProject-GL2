<?php
//Pour insérer un chauffeur dans la base de données, une classe contenant les crud est crée
//en instanciant un objet de cette classe, la cnx avec la base de données est établie
include_once '../classes/ConnexionBD.php';
class CrudCategorie{
	public $conn;
	function __construct()
    {
        $this->conn= ConnexionBD::getInstance();
    }

	function insertCategorie($p,$conn)
	{
		$req1="INSERT INTO categorie (DesignationCat,Description) 
		VALUES ('".$p->getDesignationCat()."' , '".$p->getDescription()."')";
		var_dump($req1);
		return $conn->query($req1);

	}

		function modifierCategorie($id,$p,$conn)
		{
		$req1="UPDATE categorie SET DesignationCat='".$p->getDesignationCat()."', Description ='".$p->getDescription()."' WHERE DesignationCat='".$id."'";
		var_dump($req1);
		return $conn->query($req1);

	}
	
	
	
	
	
	function afficheCategorie($conn)
	{
        $req="SELECT * FROM categorie";
        $response =$this->conn->prepare($req);
        $response->execute([]);
        return $response->fetchAll(PDO::FETCH_OBJ);

		
	}

	function supprimerCategorie($id,$conn)
	{
        $req = "DELETE from categorie WHERE DesignationCat='".$id."'";
        var_dump($req);
        $response =$this->conn->prepare($req);
        $response->execute([]);
        return $conn->query($req);

		
	}
}

?>