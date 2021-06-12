<?php
include_once 'homePageLayout.php'
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
        <form method="POST" >
            <div id="page-inner">
                    <div class="panel panel-info">
                    <div class="panel-heading"> <img src="../assets/images/add_product_icon.png">Afficher les produits </div>
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
                        <th><input type="text" class="form-control" placeholder="Image Produit" ></th>
                 
                        


                    </tr>
                </thead>
                <tbody>

                                            <?php
                                           // C:\wamp64\www\TP2-WEB-GL2\Administrator\classes\Reduction.php
                                                include_once '../Services/CrudProduit.php';
                                                include_once '../classes/ConnexionBD.php';
                                                    $connect=ConnexionBD::getInstance();
                                                    $crudProd=new CrudProduit();
                                                    $result=$crudProd->afficheProduit($connect);
                                                   // var_dump($result);
                                                    foreach($result as $prod)
                                                    {
                                                        
                                                        echo'<tr>';
                                                        echo'<td>
                                                                <b>'.$prod->Ref.'</b>
                                                            </td>';
                                                            echo'<td>
                                                                <b>'.$prod->Designation.'</b>
                                                            </td>';
                                                            echo'<td>
                                                                <b>'.$prod->PrixHT.'</b>
                                                            </td>';
                                                            echo'<td>
                                                                <b>'.$prod->Quantite.'</b>
                                                            </td>';
                                                            echo'<td>
                                                                <b>'.$prod->QuantiteMin.'</b>
                                                            </td>';
                                                            echo'<td>
                                                                <b>'.$prod->Description.'</b>
                                                            </td>';
                                                            echo'<td>
                                                                <b>'.$prod->ID_Categorie.'</b>
                                                            </td>';
                                                            echo'<td>
                                                                <b>'."<img src=data:image;base64,".$prod->ImgProduit." style=max-width:50px;width:100%></b></td>"
                                                            ;
                                                            

                                                            
                                                        echo'</tr>';
                                                    }
                                            ?>


                                        </tbody>
            </table>
        </div>
    </div>
