<?php
include_once '../isAuthenticatedAdmin.php';
include '../CommandeLivraison/commande.php';
$c= new commande();
$liste=$c->affichertoutelesCommande();
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
        <!-- /. NAV SIDE  -->

        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Liste des Commande</h1>

                    </div>
                </div>
                <!-- /. ROW  -->
                


<form method="POST" class="form-wrapper cf" action"">
					<label for="inputOrderTrackingID" class="col-sm-2 control-label">Filter Orders</label>
                        <div class="col-sm-10">
                        <input name="Search1"  id="search1" type="text" class="form-control" id="inputOrderTrackingID" value="" placeholder="#Keyword">
                    </div>
       
    </form> 
    <div id="resultat">
    <ul>
    </ul>
    </div>



                    <table class="table table-hover"  id="MyTable">
                                    <thead>
                                        <tr>
                                            
                                            <th>ID Commande</th>
                                            <th>Date Creation</th>
                                            <th>Etat Paiment</th>
                                            <th>Prix Totale</th>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Email</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                   


                                    <tbody id="table">
                             <?php

       

            
                foreach ($liste as  $l) {
                    $link='"RechercheCommande.php?idCommande='.$l[0].'&afficher=afficher"'
                    ?>

                                            <tr>
                                            <th><?php echo $l[0]; ?></th>
                                            <th><?php echo $l[1]; ?></th>
                                            <th><?php echo $l[2]; ?></th>
                                            <th><?php echo $l[3]; ?></th>
                                            <th><?php echo $l[4]; ?></th>
                                            <th><?php echo $l['prenom']; ?></th>
                                            <th><?php echo $l['email']; ?></th>
                                            <th><a href=<?php echo $link; ?> class="btn btn-primary"><i class="glyphicon glyphicon-search"></i>Afficher</a></th>

                                            </tr>
                    <?php
                }
        

                  ?>
                        </tbody>
                                </table>
            
          
               
            
             <a class="btn btn-warning" href="javascript:fnExcelReport()">Exporter en Excel</a><br>
        
                    <!-- /. ROW  -->
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <div id="footer-sec">
        &copy; gl2|2020/2021</a>
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../CommandeLivraison/assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="../CommandeLivraison/assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="../CommandeLivraison/assets/js/custom.js"></script>
    <script >
	

	var $rows = $('#table tr');
$('#search1').keyup(function() {
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    
    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});




                            function fnExcelReport()
         {
               var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
               var textRange; var j=0;
               tab = document.getElementById('MyTable'); // id of table
  
               for(j = 0 ; j < tab.rows.length ; j++)
               {    
                     tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
                     //tab_text=tab_text+"</tr>";
               }
  
               tab_text=tab_text+"</table>";
   
               var ua = window.navigator.userAgent;
               var msie = ua.indexOf("MSIE ");
  
               if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
               {
                  txtArea1.document.open("txt/html","replace");
                  txtArea1.document.write(tab_text);
                  txtArea1.document.close();
                  txtArea1.focus();
                  sa=txtArea1.document.execCommand("SaveAs",true,"Global View Task.xls");
               } 
               else //other browser not tested on IE 11
                  sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text)); 
                 return (sa);
            }
                           


</script>




</body>
</html>
