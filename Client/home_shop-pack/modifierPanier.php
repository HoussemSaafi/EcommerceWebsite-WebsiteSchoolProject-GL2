<?php
session_start();
require_once('../classes/ConnexionBD.php');

		$conn=$conn=ConnexionBD::getInstance();

$_SESSION['idProduit']=$_POST['idProduit'];

$posmodif= array_search($_SESSION['idProduit'],$_SESSION['panier']['idProduit']);
if($posmodif!==false)
{
	if($_POST['quantite']>0){
		$requette="SELECT Quantite from produit where Designation='".$_SESSION['idProduit']."'";
					$resultat=$conn->query($requette);
					$qtedispo=$resultat->fetchAll();
						foreach ($qtedispo as $v) {
							# code...
						
						if ($v['Quantite']>$_POST['quantite']) {
							$_SESSION['panier']['qte'][$posmodif]=$_POST['quantite'];
						}	
						else
							echo "kdjf";
						}

}
else
{

}
}
 header('Location: consulterPanier.php');
?>



