<?php
include_once 'homePageLayout.php'
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Promotion</h1>
                       

                    </div>
                </div>
                <!-- /. ROW  -->
               
               <!--  PAGE INNER  -->
              
                     <!--    Hover Rows  -->
                                <form method="POST">
                                
                               
                                <div class="form-group "><input autocomplete="off"  type="text" name="id" class="form-control" value="" onkeyup="search(this.value)" placeholder="Tapez votre Recherche ici"></div>
                               
                               
                                </form>

                                
                                  <div id="demo">
                               
                                     <table class="table table-hover" >
                                    <thead>
                                        <tr>
                                            
                                            <th>ID</th>
                                            <th>Taux De Promtion</th>
                                            <th>Date Debut</th>
                                            <th>Date Fin</th>
                                            <th>Description</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        include("../Services/CrudPromotion.php");
                                        $cc=new CrudPromotion();
                                        if (isset($_POST["supprimer"])){
                                            $cc->supprimerPromotion($_POST["IDProduit"],$cc->conn);
                                        }
                                        
                                          $cc->updateTable($cc->conn);
                                          $list=$cc->affichePromotion($cc->conn);
                                         
                                        foreach ($list as $l){
                                        ?>
                                        <tr>
                                        <td><?php echo $l->IDProduit ;//$l[0]?></td>
                                        <td><?php echo $l->TauxDeProm //$l[1]?></td>
                                        <td><?php echo $l->DateDebut//$l[2] ?></td>
                                        <td><?php echo $l->DateFin //$l[3]?></td>
                                        <td><?php echo $l->Description//$l[4] ?></td>
                                        <td><a class="btn btn-primary" href="PagePromUpdate.php?ID=<?php echo $l->IDProduit; ?>"><i class="glyphicon glyphicon-search"></i>Edit</a></td>
                                        <form action="../Controllers/deletePromotion.php" method="POST">
                                        <td><input type="submit" value="Supprimer" name="supprimer"></td>
                                        <td><input type="text" value="<?PHP echo $l->IDProduit ?>" name="IDProduit" hidden></td>
                                        </form> 
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                        </tbody>
                                        </table>
                                        <a class="btn btn-warning" href="javascript:fnExcelReport()">Exporter en Excel</a><br>
                                        <a class="btn" href="PagePromotion.php"><i class="glyphicon glyphicon-plus"></i>Interface Ajout</a>  
                                        
                                    
                                
                                    </div>        
                    <!-- End  Hover Rows  -->
               
            <script>
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
                           
                               <table id="MyTable" hidden>
<tr>
<td>ID</td>
<td>Taux de Promotion</td>
<td>Date debut</td>
 <td>Date fin</td>
 <td>Description</td>
  
</tr>

<?php foreach ($list as $l){?>
                                        
                                        <tr>
                                        <td><?php echo $l[0] //$l[0]?></td>
                                        <td><?php echo $l[1] //$l[1]?></td>
                                        <td><?php echo $l[2]//$l[2] ?></td>
                                        <td><?php echo $l[3] //$l[3]?></td>
                                        <td><?php echo $l[4]//$l[4] ?></td>
                                       <?php } ?>
</table>

