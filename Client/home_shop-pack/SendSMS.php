<?php
//require_once('../Administrator/classes/ConnexionBD.php');

require_once('../../Administrator/classes/ConnexionBD.php');
session_start();
$conn= ConnexionBD::getInstance();
   $result=$conn->query("SELECT * FROM produit ");
   $res=$result->fetchAll();  
   foreach($res as $r){
   	if($r['Quantite']>$r['QuantiteMin'] && $r['send']==1){
       $conn->exec("UPDATE produit SET  send=0 WHERE Ref=".$r['Ref']);
   	}
   	if($r['Quantite']<$r['QuantiteMin'] && $r['send']==0){
    //echo 'message has been sent';
    /***********************************/
               /*  send.php  */
        include ( "./src/NexmoMessage.php" );     
     // Step 1: Declare new NexmoMessage.
	$nexmo_sms = new NexmoMessage('4e8d10ac', '1a52cd45e9d0082b');
        $Designation=$r['Designation'];
        $ID=$r['IDProduit'];
    $message="Votre produit designe par: ".$Designation." dont l'ID: ".$ID." vient d'atteindre le seuil min veuillez penser a remplir votre stock ";
    //echo $message;
       
	// Step 2: Use sendText( $to, $from, $message ) method to send a message. 
	  $info = $nexmo_sms->sendText( '+21651009236', 'ProdStep', $message );          
    /***********************************/
    $conn->exec("UPDATE produit SET  send=1 WHERE Ref=".$r['IDProduit']);
   	}
    
   }                       
   header("Location:GenererFacture.php");
 ?>