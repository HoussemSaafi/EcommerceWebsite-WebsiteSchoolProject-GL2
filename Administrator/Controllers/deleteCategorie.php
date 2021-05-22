<?php
include_once '../autoload.php';
include_once '../Services/CrudCategorie.php';
$conn=ConnexionBD::getInstance();
$id = isset($_GET['id']) ? $_GET['id'] : '';
$crudProd=new CrudCategorie();
$result=$crudProd->supprimerCategorie($id,$conn);
//var_dump($result);
if($result)
{
    header("Location:../Views/Afficher_Categorie.php");
    echo 'success';
}
else
{
   var_dump($conn->errorInfo());
}