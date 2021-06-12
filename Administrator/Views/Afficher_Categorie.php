<?php
include_once 'homePageLayout.php'
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

                        <th><input type="text" class="form-control" placeholder="Description" ></th>          
                        


                    </tr>
                </thead>
                <tbody>

                                            <?php
                                            include_once '../Services/CrudCategorie.php';
                                            include_once '../classes/ConnexionBD.php';
                                            $connect=ConnexionBD::getInstance();
                                            $crudCategorie=new CrudCategorie();
                                            $result=$crudCategorie->afficheCategorie($connect);
                                            foreach($result as $categ){
                                                        echo'<tr>';
                                                        echo'<td>
                                                                <b>'.$categ->DesignationCat.'</b>
                                                            </td>';

                                                            echo'<td>
                                                                <b>'.$categ->Description.'</b>
                                                            </td>';
                                                            
                                                        echo'</tr>';
                                                    }
                                            ?>


                </tbody>
            </table>
        </div>
    </div>
