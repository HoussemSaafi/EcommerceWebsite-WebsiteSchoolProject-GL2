<?php
include_once '../isAuthenticatedAdmin.php';
include_once '../Services/CrudCategorie.php';
include_once '../classes/Categorie.php';
$cc=new CrudCategorie();
//nom=:nom  designation
if (isset($_POST['DesignationCat']) and isset($_POST['Description']))
{
    $categ=new Categorie($_POST['DesignationCat'],$_POST['Description']);
    $k=$cc->modifierCategorie($categ->getDesignationCat(),$categ,$cc->conn);
    var_dump($k);
    header('location:../Views/Afficher_Categorie.php');
    echo "Modification effectuée avec succès";
}
else{
    var_dump($_POST['DesignationCat']);
}


