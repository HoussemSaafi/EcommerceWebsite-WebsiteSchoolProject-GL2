<?php
include_once '../autoload.php';
include("../Services/CrudPromotion.php");
$conn=ConnexionBD::getInstance();
$id = isset($_POST['IDProduit']) ? $_POST['IDProduit'] : '';
$crudProm=new CrudPromotion();
$result=$crudProm->supprimerPromotion($id,$conn);
if($result)
{
    echo 'success';
}
header("Location:../Views/PageAfficher.php");