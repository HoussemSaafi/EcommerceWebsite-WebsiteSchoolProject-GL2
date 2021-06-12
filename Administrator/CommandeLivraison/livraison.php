<?php
	
include '../CommandeLivraison/commande.php';

	/**
	* 
	*/
	class Livraison	{
		
		public $conn;
		public $idCommande;
		public $dateLivraison;
		public $etatLivraison;
		public $adresse;
		public $idClient;

		public function AfficherLivraisonClient($id)
		{
			$sql = "SELECT * from livraison where IDClient=".$id;
			$res=$this->conn->query($sql);
			return $res->fetchall();
		}

		public function Modifier($id,$date,$etat)
		{
			$sql="UPDATE livraison 
			set 
			DateLivraison	='".$date."' 
			 , etatLivraison 	='".$etat."' 
			  where IDLivraison=".$id."
			";
			var_dump($sql);
			return $this->conn->query($sql);
		}

		public function Supprimer($value)
		{
			$liste=$this->conn->query("DELETE  from livraison where IDLivraison = ".$value);	
			return $liste->fetchall();
		}

		public function afficherlivraison()
		{
			$sql="SELECT * from livraison join client on client.IDClient=livraison.IDclient order by EtatLivraison";
				$res=$this->conn->query($sql);
				return $res->fetchall();
		}
		public function afficherdetaillelivraison($idlivraison)
		{
			$sql="SELECT * from livraison inner join client on livraison.IDClient=client.IDclient where livraison.idlivraison=".$idlivraison;
				$res=$this->conn->query($sql);
				return $res->fetchall();
		}
		
		
		public function detailleLivraison($dateLivraison,$adresse,$idClient)
		{
			$this->dateLivraison=$dateLivraison;
			$this->adresse=$adresse;
			$this->idClient=$idClient;
		}

		public function creerLivraison()
		{
			$sql="INSERT into livraison (DateLivraison,EtatLivraison,IDCommande,adresse,IDClient)	values(CURDATE(),'Approuvée',".$_SESSION['idCommande'].",'".$this->adresse."',".$this->idClient.")";
			//var_dump($sql);
			$res=$this->conn->query($sql);
			if($res)
			{
				echo "<br>livraison ajouter<br>";
			}
			else{echo "<br>livraison non ajouter<br>";}
		//	var_dump($res);
		}

		function __construct()
		{
			$this->conn=ConnexionBD::getInstance();


		}
	}
	

?>