<?php
include_once 'homePageLayout.php'
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Reduction</h1>
                       

                    </div>
                </div>
                <!-- /. ROW  -->
               
               <!--  PAGE INNER  -->
               

                     <!--    Hover Rows  -->
                               <form method="POST">
                                
                               
                                <div class="form-group "><input autocomplete="off"  type="text" name="id" class="form-control" value="" onkeyup="search(this.value)" placeholder="Tapez votre Recherche ici"></div>
                               
                               
                                </form>

                                <div id="demo">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            
                                            <th>ID</th>
                                            <th>Titre</th>
                                            <th>Taux De Reduction</th>
                                            <th>Date Debut</th>
                                            <th>Date Fin</th>
                                            <th>Montant min</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        include("../Services/crudReduction.php");
                                        $cc=new crudReduction();
                                        if (isset($_POST["supprimer"])){
                                            $cc->supprimerReduction($_POST["IDReduction"],$cc->conn);
                                        }
                                         $cc->updateTable($cc->conn);
                                          $list=$cc->afficheReduction($cc->conn);
                                          
                                        foreach ($list as $l){
                                        ?>
                                        <tr>
                                        <td><?php echo $l->IDReduction //$l[0]?></td>
                                        <td><?php echo $l->Titre //$l[1]?></td>
                                        <td><?php echo $l->TauxReduction//$l[2] ?></td>
                                        <td><?php echo $l->DateDebut //$l[3]?></td>
                                        <td><?php echo $l->DateFin//$l[4] ?></td>
                                        <td><?php echo $l->MontantMin//$l[4] ?></td>
                                        <td><a class="btn btn-primary" href="PageReductionUpdate.php?ID=<?php echo $l->IDReduction; ?>"><i class="glyphicon glyphicon-search"></i>Edit</a></td>
                                        <form action="" method="POST">
                                        <td><input type="submit" value="supprimer" name="supprimer"></td>
                                        <td><input type="text" value="<?PHP echo $l->IDReduction ?>" name="IDReduction" hidden></td>
                                        </form> 
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                        </tbody>
                                        </table>
                                         <a class="btn btn-warning" href="javascript:fnExcelReport()">Exporter en Excel</a><br>
                                         <a class="btn" href="PageReduction.php"><i class="glyphicon glyphicon-plus"></i>Interface Ajout</a>
                                        
                                    
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
<th>ID</th>
                                            <th>Taux De Reduction</th>
                                            <th>Date Debut</th>
                                            <th>Date Fin</th>
                                            <th>Montant min</th>
                                            <th></th>

<?php foreach ($list as $l){?>
                                        
                                        <tr>
                                        <td><?php echo $l[0] //$l[0]?></td>
                                        <td><?php echo $l[1] //$l[1]?></td>
                                        <td><?php echo $l[2]//$l[2] ?></td>
                                        <td><?php echo $l[3] //$l[3]?></td>
                                        <td><?php echo $l[4]//$l[4] ?></td>
                                       <?php } ?>
</table>


