<?php
//Pour ins�rer un chauffeur dans la base de donn�es, une classe contenant les crud est cr�e
//en instanciant un objet de cette classe, la cnx avec la base de donn�es est �tablie 
include_once '../autoload.php';
class crudReclamation{
	public $conn;
	function __construct()
	{
		$this->conn= ConnexionDB::getInstance();
	}
	function insertReclamation($rep,$conn){
	
		$req1="INSERT INTO reclamation (IDReclamation,Description,Sujet,IDClient)
		VALUES (".$rep->getIDReclamation().",'".$rep->getDescription()."','".$rep->getSujet()."','".$rep->getIDclient()."')";
		$conn->query($req1);
	}
	function afficheReclamation($conn){
		$req="SELECT * FROM reclamation";
		$liste=$conn->query($req);
		return $liste->fetchAll();	
		
	}
	function recupererReclamation($IDReclamation,$conn){
		
		$req="SELECT  IDReclamation,Description,Sujet,IDClient FROM reclamation WHERE IDReclamation=".$IDReclamation;
		$rep=$conn->query($req);
		return $rep->fetchAll();
	}
	function modifierReclamation($rep,$conn){
		$req1="UPDATE reclamation SET IDReclamation='".$rep->getIDReclamation()."',Description='".$rep->getDescription()."',Sujet='".$rep->getSujet()."',IDClient='".$rep->getIDClient()."' WHERE IDReclamation=".$rep->getIDReclamation();
		
		$conn->exec($req1);
	}
	function supprimerReclamation($IDReclamation,$conn){
		$req1="DELETE FROM reclamation where IDReclamation=".$IDReclamation;
		$conn->exec($req1);
	}
	
	function rechercheReclamation ($Description,$conn){
		$req="SELECT * FROM reclamation where reclamation.Description LIKE '%".$Description . "%'" ;
		$liste=$conn->query($req);
		return ($liste->fetchAll());
	}
	
}

?>