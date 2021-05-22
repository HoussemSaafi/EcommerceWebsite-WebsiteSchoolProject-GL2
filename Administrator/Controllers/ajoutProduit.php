<?php
include_once '../isAuthenticatedAdmin.php';
//include_once '../autoload.php';
include_once '../Services/CrudProduit.php';
$cc=new CrudProduit();
if (isset($_POST['id']) and isset($_POST['Designation'])and isset($_POST['prix']) and isset($_POST['quantite']) and isset($_POST['quantite_min']) )
{
   // $Ref,$PrixHT,$TVA,$Description,$Quantite,$QuantiteMin,$ImgProduit,$ID_Categorie
    $prod=new Produit($_POST['id'],$_POST['Designation'],$_POST['prix'],.005,$_POST['description'],$_POST['quantite'],$_POST['quantite_min'],$_POST['imageProd'],0);
    $prod->setDesignation($_POST['Designation']);
    $cc->insertProduit($prod,$cc->conn);
    header('location:../Views/Afficher_produit.php');
    echo "Insertion effectuée avec succès";
    header('location:sendMail.php?ID='.$_POST['id']);

}
else  echo "you can't add more";
?>
