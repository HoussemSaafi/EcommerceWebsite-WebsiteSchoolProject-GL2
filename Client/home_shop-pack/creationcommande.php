<?php
 


include 'livraison.php';
//if (isset($_POST['submit'])||isset($_SESSION['payement'])) {
	# code...

	$c=new Commande();
	if (($_SESSION['payement']==0) || (!isset($_SESSION['payement']))) {
		$c->etatPaiment="false";

	}
	elseif ($_SESSION['payement']==1) {
		$c->etatPaiment="true";

	}
	
	$c->CalculerPrixTotale();
	$c->ajouterCommande();

	$l=new Livraison();
	$l->detailleLivraison("",$_SESSION['adresse'],$_SESSION['client']);
	$l->creerLivraison();
	//session_unset();
	//session_start();
header("Location:SendSms.php");

//}

?>