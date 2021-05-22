<?php
include_once '../isAuthenticatedAdmin.php';
include_once '../Services/CrudProduit.php';
$cc=new CrudProduit();
//nom=:nom  designation
if (isset($_POST['PrixHT']) and isset($_POST['Quantite']) and isset($_POST['QuantiteMin']))
{
    $prod=new Produit($_POST['id'],$_POST['Designation'],$_POST['PrixHT'],.005,$_POST['Description'],$_POST['Quantite'],$_POST['QuantiteMin'],$_POST['imageProd'],0);
    $prod->setDesignation($_POST['Designation']);
    var_dump($prod);
    $cc->modifierProduit($prod,$cc->conn);
    var_dump($cc);
    var_dump($_POST['Designation']);
    header('location:../Views/Afficher_Produit.php');
    echo "Modificationn effectuée avec succès";
}


