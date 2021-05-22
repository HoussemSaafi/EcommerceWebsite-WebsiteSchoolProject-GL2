<?php
include_once '../autoload.php';
include("../Services/CrudProduit.php");
$conn=ConnexionBD::getInstance();
$id = isset($_GET['id']) ? $_GET['id'] : '';
$crudProd=new CrudProduit();
$result=$crudProd->supprimerProduit($id,$conn);
if($result)
{
    echo 'success';
    header("Location:../Views/AfficherSupprimerProduit.php");
}
else
{
   // var_dump($conn->errorInfo());
}