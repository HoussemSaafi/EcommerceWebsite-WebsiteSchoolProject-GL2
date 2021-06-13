<?php
include_once '../isAuthenticatedAdmin.php';
//include_once '../autoload.php';
include_once '../Services/CrudProduit.php';
$cc=new CrudProduit();
$image = $_FILES['imagefile']['tmp_name'];
$name = $_FILES['imagefile']['name'];
$image = base64_encode(file_get_contents(addslashes($image)));
var_dump($image);
if (isset($_POST['id']) and isset($_POST['Designation'])and isset($_POST['prix']) and isset($_POST['quantite']) and isset($_POST['quantite_min']) )
{
   // $Ref,$PrixHT,$TVA,$Description,$Quantite,$QuantiteMin,$ImgProduit,$ID_Categorie
    $p=new Produit($_POST['id'],$_POST['Designation'],$_POST['prix'],.005,$_POST['description'],$_POST['quantite'],$_POST['quantite_min'],$image,$_POST['categorie']);
    $p->setDesignation($_POST['Designation']);
    $p->setIDCategorie($_POST['categorie']);
    $p->setImgProduit($image);
    var_dump($p);
    $cc->insertProduit($p,$cc->conn);
//    header('location:../Views/Afficher_produit.php');
    echo "Insertion effectuée avec succès";
    header('location:sendMail.php?ID='.$_POST['id']);

}
else  echo "you can't add more";
?>
