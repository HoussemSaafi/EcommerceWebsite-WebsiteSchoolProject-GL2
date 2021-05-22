
<?php
include_once '../isAuthenticatedAdmin.php';
//include_once '../autoload.php';
include_once '../Services/CrudPromotion.php';
$cc=new CrudPromotion();
        if (isset($_POST['id']) and isset($_POST['tdp'])and isset($_POST['debut']) and isset($_POST['fin']) and isset($_POST['description']) )
{
$prom=new Promotion($_POST['id'],$_POST['tdp'],$_POST['debut'],$_POST['fin'],$_POST['description']);	
$cc->insertPromotion($prom,$cc->conn);
header('location:../Views/PageAfficher.php');
echo "Insertion effectuée avec succès";
}
//header('location:mail.php?ID='.$_POST['id']);
//else  echo "you can't add more";
?>
