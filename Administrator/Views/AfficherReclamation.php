<?php
//require_once ('isAuthenticated.php') ;
include_once 'homePageLayout.php';

include('../Services/crudReclamation.php') ;

$crr= new crudReclamation();
$supprimer = false;
$rechercher = false;

if ($supprimer = isset($_POST["supprimer"])){
    $crr->supprimerReclamation($_POST["IDReclamation"]);
}
 if ($rechercher = isset($_POST["rechercher"])){
    $list=$crr->rechercheReclamation($_POST["Description"]);

}
else
{
    $list=$crr->afficheReclamation();
}

?>
<!DOCTYPE html>
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
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">


</head>
<body>

</nav>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">

        <div class="panel panel-info">
            <div class="panel-body">



<h1>Liste des Reclamations</h1>
</br>
<form action="" method="POST">
    <input type="text" name="Description" >
  <a herf="rechercheReclamation.php"><input type="submit" class="btn btn-success" value="rechercher" name="rechercher"></a>

</form>
</br>




<table class="table table-striped table-bordered table-hover">
    <thead>
    <tr>
        <th>ID Reclamation</th>
        <th>Description</th>
        <th>Sujet</th>
        <th>Date Reclamation</th>
        <th>ID Client</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if($list){
        foreach ($list as $l){
            ?>

            <tr>
                <td><?php echo $l['IDReclamation'] ?></td>
                <td><?php echo $l['Description'] ?></td>
                <td><?php echo $l['sujet'] ?></td>
                <td><?php echo $l['DateReclamation'] ?></td>
                <td><?php echo $l['IDClient'] ?></td>

                <td><a href="ajoutFormReponseReclamation.php?IDReclamation=<?=$l['IDReclamation']?>" ><button class="btn btn-success">répondre</button></a>
                </td>

                <td class="table-action">
                    <form action="" method="POST">
                        <input type="hidden" name="IDReclamation" value="<?php echo $l['IDReclamation']?>">

                        <input type="submit" value="supprimer" name="supprimer"   class="btn btn-success" onclick="return confirm('êtes-vous sûr de vouloir supprimer ?')">
                        <?    header("Location:AfficherReclamation.php"); ?>
                    </form>


                </td>

            </tr>


            <?php
        }}
    ?>

    </tbody>

</table>

            </div>
        </div>


    </div>

</body>
</html>
