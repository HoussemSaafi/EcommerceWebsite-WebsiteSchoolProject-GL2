<?php
/*
require_once("session.php");
include 'C:\wamp\www\Login-Signup-PDO-OOP\class.user.php';
require_once("class.admin.php");
$auth_admin = new Admin();


$admin_id = $_SESSION['admin_session'];

$stmt = $auth_admin->runQuery("SELECT * FROM administrateur WHERE admin_id=:admin_id");
$stmt->execute(array(":admin_id"=>$admin_id));

$userRow=$stmt->fetch(PDO::FETCH_ASSOC);


*/
include_once 'homePageLayout.php';

include_once('../Services/crudClient.php') ;

$client= new crudClient();
$liste=$client->affichertouslesclient();



?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SebCom Administration</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<style>
    .filter{display: inline-block;}
</style>
</head>


    </nav>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">Gestion Utilisateurs</h1>


                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Consulter les Utilisateurs et Gestion de l'état du compte
                    </div>
                </div>
                <!-- <form method="POST" class="form-wrapper cf" action"">
                  <input type="text" placeholder="Entrez L'identifiant Client..." name="search" id="search" />
                    </form>

                    <div id="resultat">


                    <ul>
                    </ul>

                    </div>-->


                <div class="wrapper">

                    <div class="col-md-12">
                        <div class="panel panel-primary filterable">
                            <div class="panel-heading">
                                <h3 class="panel-title">Users</h3>
                                <div class="pull-right">
                                    <button class="btn btn-default btn-xs btn-filter" onclick="ShowFilter()"><span class="glyphicon glyphicon-filter"></span> Filter</button>

                                </div>
                                <div >
                                    <table id="myDIV" class="table" hidden>

                                    <tr class="filters" >
                                        <td><input type="text" class="form-control" placeholder="ID" id="myInput0" onkeyup="myFunction(0)" ></td>
                                        <td><input type="text" class="form-control" placeholder="Utilisateur" id="myInput1" onkeyup="myFunction(1)"></td>
                                        <td><input type="text" class="form-control" placeholder="Email" id="myInput2" onkeyup="myFunction(2)"></td>
                                        <td><input type="text" class="form-control" placeholder="Telephone" id="myInput3" onkeyup="myFunction(3)"></td>
                                        <td><input type="text" class="form-control" placeholder="Date de Naissance" id="myInput4" onkeyup="myFunction(4)"></td>

                                        <td><input type="text" class="form-control" placeholder="Adresse" id="myInput5" onkeyup="myFunction(5)"></td>
                                        <td><input type="text" class="form-control" placeholder="Etat" id="myInput6" onkeyup="myFunction(6)"></td>

                                        <td><input type="text" class="form-control" placeholder="Inscrit le:" id="myInput7" onkeyup="myFunction(7)"></td>


</tr>
                                    </table>

                                </div>
                            </div>
                            <table class="table"  id="myTable">
                                <thead>
                                <th>ID</th>
                                <th>Utilisateur</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Date Naissance</th>
                                <th>Adresse</th>
                                <th>Telephone</th>

                                <th>Etat</th>

                                <th>Inscrit le:</th>



                                </thead>
                                <tbody>
                                <?php



                                foreach($liste as $client)
                                {

                                    echo'<tr>';
                                    echo'<td> <b>'.$client[0].'</b> </td>';
                                    echo'<td> <b>'.$client[1].'</b></td>';
                                    echo'<td> <b>'.$client[2].'</b></td>';
                                    echo'<td><b>'.$client[3].'</b></td>';
                                    echo'<td> <b>'.$client[4].'</b> </td>';
                                    echo'<td><b>'.$client[5].'</b> </td>';
                                    echo'<td> <b>'.$client[6].'</b> </td>';
                                    echo'<td> <b>'.$client[7].'</b> </td>';
                                    echo'<td> <b>'.$client[8].'</b> </td>';

                                    echo'<td ><a href="EtatCompte.php?id='.$client['0'].'"  name ="desactiver"> Desactiver</a>
                                              <a href="EtatCompte.php?id='.$client['0'].'"  name ="activer"> Activer</a></td>';
                                    echo'</tr>';
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /. ROW  -->


        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>

<!-- /. FOOTER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="../assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="../assets/js/bootstrap.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="../assets/js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="../assets/js/custom.js"></script>
<script>
    function myFunction(K) {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput"+K);
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[K];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
    function ShowFilter() {
        var x = document.getElementById("myDIV");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
<script src="../assets/js/recherche_dynamique.js"></script>


</body>
</html>
