<?php
include_once '../isAuthenticatedAdmin.php';
include '../CommandeLivraison/livraison.php';
if(!isset($_GET['afficher']))
{
$l=new livraison();
$listelivraison=$l->afficherlivraison();
}
if(isset($_GET['afficher'])&& !is_null($_GET['idlivraison']))
{
if ($_GET['idlivraison']) {
       $c= new livraison();
$listelivraison=$c->afficherdetaillelivraison($_GET['idlivraison']);
    }
    else
        {
$l=new livraison();
$listelivraison=$l->afficherlivraison();
}
}

if(isset($_GET['supprimer']))
{
$l= new livraison();
$liste=$l->Supprimer($_GET['idlivraison']);
header("Location:ListeLivraison.php");
}
if(isset($_GET['date'])&&isset($_GET['etat']))
{
$l= new livraison();
if ($l->Modifier($_GET['id'],$_GET['date'],$_GET['etat'])) {
   header("Location:ListeLivraison.php");
}

}



?>


<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Home Page</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="../assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script>
        function search(keyword)
        {
            var xhttp = new XMLHttpRequest();
            xhttp.open("POST", "liveSearch.php?keyword="+keyword, true);
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById("demo").innerHTML = xhttp.responseText;
                }
            };

            xhttp.send();
        }

    </script>
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">GL2 SHOP</a>
        </div>

        <div class="header-right">


            <a href="logout.php?logout=true" class="btn btn-danger" title="Logout"><i class="fa fa-sign-out ""></i>Logout</a>


        </div>
    </nav>
    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li>
                    <div class="user-img-div">


                        <div class="inner-text">
                            <label >Welcome to your<br>
                                Administrator View


                        </div>
                    </div>

                </li>

                <li>
                    <a  class="active-menu" href="index.php"><i class="fa fa-desktop "></i>Dashboard</a>
                </li>
                <li>
                    <a href="#"  class="active-menu-top"><i class="fa fa-desktop "></i>Gestion Client <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse in">
                        <li>
                            <a  href="RechercheClient.php"><i class="fa fa-desktop "></i>Rechercher Client</a>
                        </li>

                    </ul>

                </li>



                <li>
                    <a href="#"  class="active-menu-top"><i class="fa fa-desktop "></i>DISCOUNT <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse in">
                        <li>
                            <a  href="PagePromotion.php"><i class="fa fa-toggle-on"></i>Promotion</a>
                        </li>
                        <li>
                            <a href="PageReduction.php"><i class="fa fa-bell "></i>Reduction</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="#"  class="active-menu-top"><i class="fa fa-desktop "></i>Gestion des Commandes et Livraisons<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse in">
                        <li>
                            <a href="ListeCommande.php"><i class="fa fa-edit "></i>Liste des Commande</a>
                        </li>

                        <li>
                            <a href="ListeLivraison.php"><i class="fa fa-circle-o "></i>Liste Livraison</a>
                        </li>


                    </ul>

                <li>
                    <a href="#"  class="active-menu-top"><i class="fa fa-desktop "></i>Gestion des produits <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse in">

                        <li>
                            <a  href="Ajouter_Produit.php"><i class="fa fa-toggle-on"></i>Ajouter produit</a>
                        </li>
                        <li>
                            <a   href="Afficher_Produit.php"><i class="fa fa-bell "></i>Afficher produits</a>
                        </li>
                        <li>
                            <a href="AfficherModifierProduit.php"><i class="fa fa-circle-o "></i>Modifier produit</a>
                        </li>
                        <li>
                            <a href="AfficherSupprimerProduit.php"><i class="fa fa-code "></i>Supprimer produit</a>
                        </li>


                    </ul>
                </li>
                <li>
                    <a href="#"  class="active-menu-top"><i class="fa fa-desktop "></i>Gestion des categorie <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse in">

                        <li>
                            <a href="Ajouter_Categorie.php"><i class="fa fa-toggle-on"></i>Ajouter categorie</a>
                        </li>
                        <li>
                            <a  href="Afficher_Categorie.php"><i class="fa fa-bell "></i>Afficher categorie</a>
                        </li>
                        <li>
                            <a href="AfficherModifierCategorie.php"><i class="fa fa-circle-o "></i>Modifier categorie</a>
                        </li>
                        <li>
                            <a href="AfficherSupprimerCategorie.php"><i class="fa fa-code "></i>Supprimer categorie</a>
                        </li>


                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-desktop "></i>Réclamations<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="AfficherReclamation.php"><i class="fa fa-toggle-on"></i>Liste des réclamations</a>
                        </li>
                        <li>
                            <a href="afficheReponseReclamation.php"><i class="fa fa-bell "></i>Réponses aux réclamations</a>
                        </li>
                    </ul>
                </li>
    </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Consultaion d'une commande d'un client</h1>

                    </div>


                    <div class="row shop-tracking-status">
                        
                        <div class="col-md-12">
                            <div class="well">
                        <form >
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label for="inputOrderTrackingID" class="col-sm-2 control-label">Order id</label>
                                            <div class="col-sm-10">
                                            <input  name="idlivraison" type="text" class="form-control" id="inputOrderTrackingID" value="" placeholder="# put your order id here">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <input value="Afficher" name="afficher" type="submit" id="shopGetOrderStatusID" class="btn btn-success"></input>
                                        </div>
                                    </div>
                                </div>
                        </form>
                               

                               
                            </div>
                        </div>

                    </div>
                               
                                  <div class="col-md-12" >                              
                                <?php

                                       if (isset($listelivraison)) {?>
                                                               <table class="table table-hover ">

                                                                    <thead>
                                                                        <tr>
                                                                            
                                                                            <th>ID Livraison</th>
                                                                            <th>Date Livraison</th>
                                                                            <th>Etat Livraison</th>
                                                                            <th>ID Commande   </th>
                                                                            <th>adresse </th>
                                                                            <th>ID Client</th>
<!--                                                                            <th>Nom</th>-->
                                                                            <th>Prenom</th>
                                                                            <th>Telephone</th>
                                                                            <th></th>
                                                                            <th></th>
                                                                            <th></th>
                                                                        </tr>
                                                                    </thead>
                                                                   


                                                                    <tbody>
                                                           
                                       
                                <?php
                                            
                                                foreach ($listelivraison as  $l) {
                                                    $link='"ListeLivraison.php?idlivraison='.$l[0].'&supprimer=supprimer"';
                                                    $link2='"RechercheLivraison.php?idlivraison='.$l[0].'"';
                                                    //$link3='"progress.php?idlivraison='.$l[0].'&modifier=modifier"';
                                                    ?>
                                                    <form>
                                                                            <tr>
                                                                            <th><?php echo $l[0]; ?></th>
                                                                            <input name="id" value="<?php echo $l[0]; ?>" hidden="true"></input>
                                                                            <th><input name="date" class="btn  btn-file btn-default" type="date" value=<?php echo date($l[3]); ?>></input></th>
                                                                            <th><select name="etat">
                                                                                <option><?php echo $l[4]; ?></option>
                                                                                <option>Approuvée</option>
                                                                                <option>En Progression</option>
                                                                                <option>Embarquée</option>
                                                                                <option>Livrée</option>
                                                                                <option>Terminée</option>



                                                                            </select></th>
                                                                            <th><?php echo $l[2]; ?></th>
                                                                            <th><?php echo $l[12]; ?></th>
                                                                            <th><?php echo $l[1]; ?></th>
<!--                                                                            <th>--><?php //echo $l[9]; ?><!--</th>-->
                                                                            <th><?php echo $l[8]; ?></th>
                                                                            <th><?php echo $l[11]; ?></th>
                                                                            <th><a href=<?php echo $link; ?> class="btn btn-danger"></i>Supprimer</a></th>
                                                                            <th><a href=<?php echo $link2; ?> class="btn btn-primary"></i>Afficher</a></th>
                                                                            <th><input type="submit" class="btn btn-primary" value="Modifier"></i></input></th>
                                                                           
                                                                            </tr>
                                                                            </form>
                                                    <?php
                                                }
                                        }

                                                  ?>
                                                        </tbody>
                                                                </table>
                                     


                                      </div>


                </div>
                <!-- /. ROW  -->
             
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../CommandeLivraison/assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="../CommandeLivraison/assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../CommandeLivraison/assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="../CommandeLivraison/assets/js/custom.js"></script>


</body>
</html>
