
<?php

include("../Services/crudReduction.php");

$cc=new CrudReduction();


        if (isset($_POST['titre']) and isset($_POST['tdr'])and isset($_POST['debut']) and isset($_POST['fin']) and isset($_POST['MontantMin']) )
{
$Reduction=new Reduction(NULL,$_POST['titre'],$_POST['tdr'],$_POST['debut'],$_POST['fin'],$_POST['MontantMin']);
$k=$cc->insertReduction($Reduction,$cc->conn);
var_dump($k);
header('location:../Views/PageAfficherReduction.php');
echo "Insertion effectuée avec succès";
}
header('location:../Views/PageAfficherReduction.php');
//else  echo "you can't add more";

?>
