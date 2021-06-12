<?php
include_once 'homePageLayout.php'
?>
    <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
        <form method="POST" >
            <div id="page-inner">
                    <div class="panel panel-info">
                    <div class="panel-heading"> <img src="../add_product_icon.png">Afficher les produits </div>
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
                        <th><input type="text" class="form-control" placeholder="Reference" ></th>
                        <th><input type="text" class="form-control" placeholder="Designation" ></th>
                        <th><input type="text" class="form-control" placeholder="Prix" ></th>
                        <th><input type="text" class="form-control" placeholder="Quantité" ></th>
                        <th><input type="text" class="form-control" placeholder="Quantité minimum" ></th>
                        <th><input type="text" class="form-control" placeholder="Description" ></th>
                        <th><input type="text" class="form-control" placeholder="ID catégorie" ></th>
                        <th> Supprimer</th>
                 
                        


                    </tr>
                </thead>
                <tbody>

                                            <?php
                                            include_once '../Controllers/deleteProduit.php';
                                            include_once '../Services/CrudProduit.php';
                                            include_once '../classes/ConnexionBD.php';
                                            $connect=ConnexionBD::getInstance();
                                            $crudProd=new CrudProduit();
                                            $result=$crudProd->afficheProduit($connect);


                                            foreach($result as $prod)
                                            { ?>

                                                <tr>
                                                    <td>
                                                        <b><?= $prod->Ref ?></b>
                                                    </td>
                                                    <td>
                                                        <b><?= $prod->Designation ?></b>
                                                    </td>
                                                    <td>
                                                        <b><?= $prod->PrixHT ?></b>
                                                    </td>
                                                    <td>
                                                        <b><?= $prod->Quantite ?></b>
                                                    </td>
                                                    <td>
                                                        <b><?= $prod->QuantiteMin ?></b>
                                                    </td>
                                                    <td>
                                                        <b><?= $prod->Description ?></b>
                                                    </td>
                                                    <td>
                                                        <b><?= $prod->ID_Categorie ?></b>
                                                    </td>
                                                    <td>
                                                        <a onclick="return confirm('êtes-vous sûr de vouloir supprimer ?')" href="../Controllers/deleteProduit.php?id=<?= $prod->Ref ?>"> Supprimer </a>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
            </table>
        </div>
    </div>
