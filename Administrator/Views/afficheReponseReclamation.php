<?php
include_once 'homePageLayout.php';

/* require_once("session.php");
require_once("../classes/Admin.php");
$auth_admin = new Admin();
$admin_id = $_SESSION['admin_session'];
$stmt = $auth_admin->runQuery("SELECT * FROM administrateur WHERE admin_id=:admin_id");
$stmt->execute(array(":admin_id"=>$admin_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

*/?>



<?php

//require_once ('isAuthenticated.php') ;
include('../Services/crudReponseReclamation.php') ;
$crr= new crudReponseReclamation();
$supprimer=false ;


if ($supprimer = isset($_POST["supprimer"])){
 $crr->supprimerReponseReclamation($_POST["IDRepReclamation"]);

}
    $list = $crr->afficheReponseReclamation();





?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SEBCOM</title>
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
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css"/>

</head>

</nav>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">

        <div class="panel panel-info">
            <div class="panel-body">

<h1>Liste des rep Reclamations</h1>
</br>





<table class="table table-striped table-bordered table-hover">
    <thead>
    <tr>
        <th>ID Réponse Reclamation</th>
        <th>Reponse</th>
        <th>ID Reclamation</th>

    </tr>
    </thead>
    <tbody>
    <?php
        foreach ($list as $l){
            ?>

            <tr>
                <td><?php echo $l['IDRepReclamation']?></td>
                <td><?php echo $l['reponse'] ?></td>
               <td><?php echo $l['IDReclamation'] ?></td>

                <td class="table-action">
                    <form action="" method="POST">
                          <input type="hidden" name="IDRepReclamation" value="<?php echo  $l['IDRepReclamation']?>">
                        <input type="submit" value="supprimer" name="supprimer"  class="btn btn-success" onclick="return confirm('êtes-vous sûr de vouloir supprimer ?')">
                        <? header("Location:../Views/afficheReponseReclamation.php"); ?>

                    </form>


                </td>

            </tr>


            <?php
        }
    ?>

    </tbody>
</table>
<a href="ajoutFormReponseReclamation.php"><button class="btn btn-success">ajouter Réponse Reclamation</button></a>


</div>
        </div>
    </div>
</div>
</body>
</html>