<?php
include_once '../isAuthenticatedAdmin.php';
include_once '../autoload.php';
include_once '../Services/CrudCategorie.php';
$cc=new CrudCategorie();
if (isset($_POST['NomCat']) and isset($_POST['description']))
{
    $categ=new Categorie($_POST['NomCat'],$_POST['description']);
    $k=$cc->insertCategorie($categ,$cc->conn);
    header('location:../Views/Afficher_Categorie.php');
    echo "Insertion effectuée avec succès";
}
//header('location:mail.php?ID='.$_POST['id']);
//else  echo "you can't add more";
?>
