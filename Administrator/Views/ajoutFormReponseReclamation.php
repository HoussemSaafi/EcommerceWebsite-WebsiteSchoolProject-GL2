<?php
//require_once ('isAuthenticated.php') ;
include_once 'homePageLayout.php';

include_once('../Services/crudReponseReclamation.php') ;

$crr= new crudReponseReclamation();
$ajout = false;

if (isset($_POST["ajouter"])){
    $IDReclamation= $_POST["IDReclamation"];
        $reponse= $_POST["reponse"];
    $rep = new ReponseReclamation($IDReclamation,$reponse);
    $crr->insertReponseReclamation($rep);

}
/**/
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
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
</nav>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">

        <div class="panel panel-info">
            <div class="panel-body">

<form action="" method="POST">
    <table border="0">
        <tr>
            <td> Réponse :  </td>
            <td>
                <div class="control-group">
                    <label class="control-label"></label>
                    <div class="controls">
                        <textarea rows="4" cols="100"name="reponse" maxlength="255"> </textarea>
                        <p class="help-block">255 charactere</p>
                    </div>
                </div></td>
        </tr>
        <tr>
            <td> IDReclamation : </td>
            <td> <div class="control-group">
                    <label class="control-label"></label>
                    <div class="controls">
                        <input type="number" name="IDReclamation" />
                        <p class="help-block">number only</p>
                    </div>
                </div>
                <div class="form-actions"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" class="btn btn-success" value="ajouter" name="ajouter" ></td>
        </tr>
    </table>
</form>

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
<script src="../assets/js/application.js"></script>

            </div>
        </div>
    </div>
</div>

</body>
</html>
<?php
include_once 'footerPageLayout.php';
?>