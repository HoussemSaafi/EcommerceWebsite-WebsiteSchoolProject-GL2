<?php
include_once 'homePageLayout.php'
?>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">UPDATE</h1>
                        

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
               <div class="panel panel-info">
                        <div class="panel-heading">
                           Reduction
                        </div>
                        <div class="panel-body">
                        
                            <form role="form" method="POST" action="">
                            <?PHP
                        include("../Services/crudReduction.php");
                        $cc=new crudReduction();
                        if (isset($_POST['Modif'])){
                            $newReduction=new Reduction($_POST['id'],$_POST['titre'],$_POST['tdr'],$_POST['debut'],$_POST['fin'],$_POST['MontantMin']);
                            $cc->modifierReduction($newReduction,$cc->conn);
                            echo("<script>location = 'PageAfficherReduction.php?';</script>");
                            //header('location:PageAfficher.php');
                        }else {
                            $ID=$_GET['ID'];
                            $Reduction=$cc->recupererReduction($ID);
                           // var_dump($Reduction);
                        ?>
                            <?PHP foreach ($Reduction as $ch){ ?>

                                        <div class="form-group">	
                                            <label>ID Reduction</label><br>
                                        	<select class="form-control" name="id" > 
                                            <option selected><?PHP echo $ch[0];?> </option>
                                        	</select>
                                            
                                            <p class="help-block">Help text here.</p>
                                        </div>

                                 <div class="form-group">
                                            <label>Titre de reduction</label>
                                            <input class="form-control" type="text" name="titre" value="<?PHP echo $ch[1];?>">
                                     <p class="help-block">Help text here.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Taux de Reduction</label>
                                            <input class="form-control" type="number" name="tdr" value="<?PHP echo $ch[2];?>">
                                     <p class="help-block">Help text here.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Date debut</label>
                                            <input class="form-control" type="date" name="debut" value="<?PHP echo $ch[3];?>">
                                     <p class="help-block">Help text here.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Date fin</label>
                                            <input class="form-control" type="date" name="fin" value="<?PHP echo $ch[4];?>">
                                     <p class="help-block">Help text here.</p>
                                        </div>

                                            <div class="form-group">
                                            <label>Montant Min</label>
                                            <input type="number" class="form-control"  name="MontantMin" value="<?PHP echo $ch[5];?>"></input>
                                        </div>
                                  
                                 
                                        <button type="submit" class="btn btn-info"  name="Modif">Save </button>
                                        <?PHP } ?>
                                    </form>
                                    <?PHP } ?>
                            </div>
                        </div>
                            </div>

