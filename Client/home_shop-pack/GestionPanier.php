<?php

session_start();

	/**
	* 
	*/



require_once('../../Administrator/classes/ConnexionBD.php');


	class Panier 
	{
			
			public $nom;
			public $prix;
			public $conn;
		
		function __construct()
		{
			$this->conn= ConnexionBD::getInstance();		}
		
        function CreerPanier(){
			if(!isset($_SESSION['panier'])){

		$_SESSION['panier'] = array();
		$_SESSION['panier']['idProduit']  = array();
		$_SESSION['panier']['qte']  = array();
		$_SESSION['panier']['prixProduit']  = array();

			}
				return true;
		}


		function AjouterProduit(){
			echo "hi" ;
var_dump($_SESSION['thispage']);
            $id = $_SESSION['idProduit'] ;
			var_dump($_SESSION['idProduit']);

			$req="SELECT * from produit where Ref='.$id.'";

			//$req="SELECT Designation from produit where Ref='.$id.'";
			$res=$this->conn->query($req);
			$res=$res->fetchAll();
			$_SESSION['idProduit']=$res[0][0];
			$_SESSION['qte']=$_GET['qte'];

			if (isset($_SESSION['idProduit']) and isset($_SESSION['qte']))
			{
				if ($this->CreerPanier()) {
					$positionProduit=array_search($_SESSION['idProduit'],$_SESSION['panier']['idProduit']);
					echo $positionProduit;
					if ($positionProduit!==false) {
						$requette="SELECT Quantite from produit where Designation='".$_SESSION['idProduit']."'";
						$resultat=$this->conn->query($requette);
						$qtedispo=$resultat->fetchAll();
						foreach ($qtedispo as $v) {
							# code...

							if ($v['Quantite']>$_SESSION['panier']['qte'][$positionProduit]+$_SESSION['qte']) {
								$_SESSION['panier']['qte'][$positionProduit]+=$_SESSION['qte'];
							}
							else
								echo "err1";
						}





//					$_SESSION['panier']['qte'][$positionProduit]+=$_SESSION['qte'];




					}
					else{

						$requette="SELECT Quantite from produit where Designation='".$_SESSION['idProduit']."'";
						$resultat=$this->conn->query($requette);
						$qtedispo=$resultat->fetchAll();
						foreach ($qtedispo as $v) {
							# code...

							if ($v['Quantite']>$_SESSION['qte']) {




								array_push($_SESSION['panier']['idProduit'], $_SESSION['idProduit']);
								array_push($_SESSION['panier']['qte'], $_SESSION['qte']);

								$id=$_SESSION['idProduit'];
								$sql="SELECT PrixHT,TVA from produit where Designation ='".$id."'";
								//var_dump($sql);
								$res= $this->conn->query($sql);
								///var_dump($res);
								$liste=$res->fetchAll();
								foreach ($liste as $value) {
									echo $value;
								}	}
							else
								echo "errr2";


						}
					}

					foreach ($liste as $l) {
						$price=$l['PrixHT']+$l['PrixHT']*$l['TVA']/100;
						array_push($_SESSION['panier']['prixProduit'],$price );

					}




				}
				foreach ($_SESSION['panier']['idProduit'] as $key => $value) {
					echo $value."<br>";
					echo $_SESSION['panier']['prixProduit'][$key];
				}
				foreach ($_SESSION['panier']['qte'] as $key => $value) {
					echo $value."<br>";
				}



				echo $_SESSION['idProduit']."  ";
				echo $_SESSION['qte'];


			}
			else echo "err";




		}
	}

$p=new Panier();



$p->CreerPanier();
echo "hola " ;
$p->AjouterProduit();
//header('Location:'.$_SESSION['thispage']);

header('Location:consulterPanier.php');




?>



