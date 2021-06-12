<?php
include_once 'homePageLayout.php';
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
        <form method="POST" >
            <div id="page-inner">
                    <div class="panel panel-info">
                    <div class="panel-heading"> <img src="add_product_icon.png">Afficher les produits </div>
                    <div class="panel-body">


             <div class="container">
 
    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Users</h3>
                
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="Nom Categorie" ></th>
                        <th> Supprimer</th>
                 
                        


                    </tr>
                </thead>
                <tbody>

                                            <?php
                                            include_once '../Services/CrudCategorie.php';
                                            include_once '../classes/ConnexionBD.php';
                                            $connect=ConnexionBD::getInstance();
                                            $crudProd=new CrudCategorie();
                                            $result=$crudProd->afficheCategorie($connect);

                                            foreach($result as $prod)
                                            { ?>
                                                <tr>
                                                    <td>
                                                        <b><?= $prod->DesignationCat ?></b>
                                                    </td>
                                                    <td>
                                                        <b><?= $prod->Description ?></b>
                                                    </td>
                                                    <td>
                                                        <a onclick="return confirm('êtes-vous sûr de vouloir supprimer ?')" href="../Controllers/deleteCategorie.php?id=<?= $prod->DesignationCat ?>"> Supprimer </a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
            </table>
            <div id="err"></div>
        </div>
    </div>
