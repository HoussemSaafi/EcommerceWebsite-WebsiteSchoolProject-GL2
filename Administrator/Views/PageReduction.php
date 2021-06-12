<?php
include_once 'homePageLayout.php'
?>
        <!-- /. NAV SIDE  -->
 <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">ADD Reduction</h1>
                        

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
               <div class="panel panel-info">
                        <div class="panel-heading">
                           Reduction
                        </div>
                          <script type="text/javascript">

                        function check_reduction(){

                        	var tdr=document.getElementById('tdr').value;
                        	var i=0;

                        	if(tdr=="") {
                                    document.getElementById('tdr').style.borderColor ="red";
                                    document.getElementById('tdr_help').innerHTML="<p style='color:red'>vous ne pouvez pas laisser ce champ vide.</p>";
                                    i++;
                                }else{
                                    document.getElementById('tdr').style.borderColor ="gray";
                                    document.getElementById('tdr_help').innerHTML="<p style='color:red'></p>";
                                }
                        	 if(tdr<0){
                                    document.getElementById('tdr').style.borderColor ="red";
                                    document.getElementById('tdr_help').innerHTML="<p style='color:red'>le taux de promotion doit être superieur à zéro</p>";
                                    i++;
                                  }

                               else if(tdr>100){
                                    document.getElementById('tdr').style.borderColor ="red";
                                    document.getElementById('tdr_help').innerHTML="<p style='color:red'>le taux de promotion ne doit pas depasser 100 %</p>";
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

                         function check_titre(){
                                var titre=document.getElementById('titre').value;
                                var i=0;
                                 
                                if(titre=="") {
                                    document.getElementById('titre').style.borderColor ="red";
                                    document.getElementById('titre_help').innerHTML="<p style='color:red'>vous ne pouvez pas laisser ce champ vide.</p>";
                                    i++;
                                }
                               else{
                               	 document.getElementById('titre').style.borderColor ="gray";
                                    document.getElementById('titre_help').innerHTML="<p style='color:red'></p>";
                                   
                               }
                               if(i!=0){return false;}
                                else return true;
                           }
                           function check_montant(){
                                var MontantMin=document.getElementById('MontantMin').value;
                                var i=0;
                                 
                                if(MontantMin=="") {
                                    document.getElementById('MontantMin').style.borderColor ="red";
                                    document.getElementById('MontantMin_help').innerHTML="<p style='color:red'>vous ne pouvez pas laisser ce champ vide.</p>";
                                    i++;
                                }
                                
                               else{
                               	 document.getElementById('MontantMin').style.borderColor ="gray";
                                    document.getElementById('MontantMin_help').innerHTML="<p style='color:red'></p>";
                                    
                               }
                               if(i!=0){return false;}
                                else return true;
                           }

                            function check_info(){
                                var titre=document.getElementById('titre').value;
                                var tdr=document.getElementById('tdr').value;
                                var debut=document.getElementById('debut').value;
                                var fin=document.getElementById('fin').value;
                                var MontantMin=document.getElementById('MontantMin').value;
                                 
                                check_date();
                                check_reduction();
                                check_titre();
                                check_montant();
                                
                   if(!check_date() || !check_montant() || !check_reduction() || !check_titre() ){
                   return false;
                       }
                               
                   else return true;  

                            }

                        </script>
                        <div class="panel-body">
                            <form role="form" method="POST" action="../Controllers/ajoutReduction.php" onsubmit="return check_info();">
                                        <div class="form-group">
                                                                                          	
                                            
                                  <label>Titre de Reduction</label>
                                            <input class="form-control" type="text" name="titre" id="titre" onchange="return check_titre();">
                                            <p class="help-block" id="titre_help">Help text here.</p>
                                        </div>
                                 <div class="form-group">
                                            <label>Taux de reduction</label>
                                            <input class="form-control" type="number" name="tdr" id="tdr" onchange="return check_reduction();">
                                     <p class="help-block" id="tdr_help">Help text here.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Date debut</label>
                                            <input class="form-control" type="date" name="debut" id="debut" onchange="return check_date();" min="<?php echo date('Y-m-d'); ?>" >
                                      <p class="help-block" id="debut_help"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Date fin</label>
                                            <input class="form-control" type="date" name="fin" id="fin" onchange="return check_date();" min="<?php echo date('Y-m-d'); ?>" >
                                     <p class="help-block" id="fin_help"></p>
                                        </div>

                                            <div class="form-group">
                                            <label>Montant Minimal</label>
                                            <input type="number" class="form-control" rows="3" name="MontantMin" id="MontantMin" min="0" onchange="return check_montant();">
                                            <p class="help-block" id="MontantMin_help"></p>
                                        </div>
                                  
                                 
                                        <button type="submit" class="btn btn-info">Save </button>
                                        <a class="btn btn-success" href="PageAfficherReduction.php" name="liste"> liste </a>
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

