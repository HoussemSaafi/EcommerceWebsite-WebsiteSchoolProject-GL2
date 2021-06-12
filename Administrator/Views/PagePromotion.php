<?php
include_once 'homePageLayout.php'
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">ADD PROMOTION</h1>
                        

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
               <div class="panel panel-info">
                        <div class="panel-heading">
                           PROMOTION
                        </div>
                        <script type="text/javascript">

                        function check_promotion(){

                        	var tdp=document.getElementById('tdp').value;
                        	var i=0;

                        	if(tdp=="") {
                                    document.getElementById('tdp').style.borderColor ="red";
                                    document.getElementById('tdp_help').innerHTML="<p style='color:red'>vous ne pouvez pas laisser ce champ vide.</p>";
                                    i++;
                                }else{
                                    document.getElementById('tdp').style.borderColor ="gray";
                                    document.getElementById('tdp_help').innerHTML="<p style='color:red'></p>";
                                }
                        	 if(tdp<0){
                                    document.getElementById('tdp').style.borderColor ="red";
                                    document.getElementById('tdp_help').innerHTML="<p style='color:red'>le taux de promotion doit être superieur à zéro</p>";
                                    i++;
                                  }

                               else if(tdp>100){
                                    document.getElementById('tdp').style.borderColor ="red";
                                    document.getElementById('tdp_help').innerHTML="<p style='color:red'>le taux de promotion ne doit pas depasser 100 %</p>";
                                    i++;
                                  }
                                  if(i!=0){return false;}
                                  else return true;
                        }

                        function check_date(){
                        	var debut=document.getElementById('debut').value;
                        	var fin=document.getElementById('fin').value;
                        	var current_date= new Date();
                            var debut_date= new Date(document.getElementById('debut').value);
                            var fin_date= new Date(document.getElementById('fin').value);
                            var i=0;
                            if(debut=="") {
                                    document.getElementById('debut').style.borderColor ="red";
                                    document.getElementById('debut_help').innerHTML="<p style='color:red'>vous ne pouvez pas laisser ce champ vide.</p>";
                                    i++;
                                    
                                }else{
                                	document.getElementById('debut').style.borderColor ="gray";
                                    document.getElementById('debut_help').innerHTML="<p style='color:red'></p>";
                                }
                                if(fin=="") {
                                    document.getElementById('fin').style.borderColor ="red";
                                    document.getElementById('fin_help').innerHTML="<p style='color:red'>vous ne pouvez pas laisser ce champ vide.</p>";
                                    i++;
                                    
                                }else{
                                	document.getElementById('fin').style.borderColor ="gray";
                                    document.getElementById('fin_help').innerHTML="<p style='color:red'></p>";
                                }
                                if(document.getElementById('debut').value>document.getElementById('fin').value && fin!="" && debut!=""){
                                     document.getElementById('debut_help').innerHTML="<p style='color:red'>Veuillez vérifiez la date début et la date fin de la promotion.</p>";
                                      document.getElementById('fin_help').innerHTML="<p style='color:red'>Veuillez vérifiez la date début et la date fin de la promotion.</p>";
                                      i++;
                                    
                                     }
                                    

                                    if(i==0){
                                    	document.getElementById('debut').style.borderColor ="gray";
                                    document.getElementById('debut_help').innerHTML="<p style='color:red'></p>";
                                    document.getElementById('fin').style.borderColor ="gray";
                                    document.getElementById('fin_help').innerHTML="<p style='color:red'></p>";
                                }
                                    
                                    if(i!=0){return false;}
                                    else return true;

                        }

                            function check_info(){
                            	var id=document.getElementById('id').value;
                            	var tdp=document.getElementById('tdp').value;
                            	var debut=document.getElementById('debut').value;
                                var fin=document.getElementById('fin').value;

                               check_date();
                               check_promotion();
                               if(!check_date() ||!check_promotion()|| id=="" || tdp=="" || debut=="" || fin==""){
                               	return false;
                               }
                                

                            }

                        </script>
                        <div class="panel-body">
                            <form role="form" method="POST" action="../Controllers/ajoutPromotion.php" onsubmit="return check_info();">
                                        <div class="form-group">
                                            
                                            <?php
                                            include("../Services/CrudProduit.php");
                                            $c=new CrudProduit();
                                            $liste= $c->afficheProduit($c->conn);
                                            if(empty($liste))
                                            {
                                                 echo("<script>location = 'PageAfficher.php?';</script>");
                                            }
                                        	?>
                                        	
                                            <label>ID Produit</label><br>
                                        	<select class="form-control" name="id" id="id"> 
                                        	<?php
                                        	foreach ($liste as $key => $value) {
                                        	?>
                                        	<option><?php echo $value->Ref;?> </option>
                                        	<?php
                                        	}
                                        	?>
                                        	</select>
                                            
                                            <p class="help-block" id="id_help"></p>
                                        </div>
                                 <div class="form-group">
                                            <label>Taux de promotion</label>
                                            <input class="form-control"  name="tdp" id="tdp" onchange="return check_promotion();">
                                     <p class="help-block" id="tdp_help" ></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Date debut</label>
                                            <input class="form-control" type="date" name="debut" id="debut"  onchange="return check_date();"
                                           min="<?php echo date('Y-m-d'); ?>" >
                                            
                                     <p class="help-block" id="debut_help"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Date fin</label>
                                            <input class="form-control" type="date" name="fin" id="fin" onchange="return check_date();" min="<?php echo date('Y-m-d'); ?>" >
                                     <p class="help-block" id="fin_help"></p>
                                        </div>

                                            <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" rows="3" name="description" id="description"></textarea>
                                        </div>
                                  
                                         
                                        <input type="submit" value="save" class="btn btn-info" name="save">   
                                        <a class="btn btn-success" href="PageAfficher.php" name="liste"> liste </a>
                                        <a class="btn btn-warning" href="javascript:imprimer_page()">PDF</a>
                                        </form>
                                        
                                    
                            </div>
                        </div>
                            </div>
                            <script type="text/javascript">
                            function imprimer_page(){
                                
                              window.print();
                            }
                            </script>


