<?php
include_once '../isAuthenticatedAdmin.php';
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
            <a class="navbar-brand" href="index.php
							<li><span>			<li><span></span></li></span></li>">GL2 SHOP</a>
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