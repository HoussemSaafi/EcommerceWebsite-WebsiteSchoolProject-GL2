<?php
	
	include 'commande.php';
	$c=new Commande();
	
	$username=$_POST['username'];
	$mdp=$_POST['mdp'];
	if($c->ValiderSession($username,$mdp))
	{$_SESSION['client']=$c->idClient;
		header('Location:remplirAdresse.php');}
		
	else{echo "erreur client<br>";}
	


?>