<?php
include_once 'homePageLayout.php'
?>
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
                           PROMOTION
                        </div>
                        <div class="panel-body">
                        
                            <form role="form" method="POST" action="">
                            <?PHP
                        include("../Services/CrudPromotion.php");
                        $cc=new CrudPromotion();
                        if (isset($_POST['Modif'])){
                            $newPromotion=new Promotion($_POST['id'],$_POST['tdp'],$_POST['debut'],$_POST['fin'],$_POST['description']);
                            $cc->modifierPromotion($newPromotion,$cc->conn);
                            echo("<script>location = 'PageAfficher.php?';</script>");
                        }else {
                            $ID=$_GET['ID'];
                            $promotion=$cc->recupererPromotion($ID,$cc->conn);
                        ?>
                            <?PHP foreach ($promotion as $ch){ ?>

                                        <div class="form-group">	
                                            <label>ID Produit</label><br>
                                        	<select class="form-control" name="id" > 
                                            <option selected><?PHP echo $ch[0];?> </option>
                                        	</select>
                                            
                                            <p class="help-block">Help text here.</p>
                                        </div>

                                 <div class="form-group">
                                            <label>Taux de promotion</label>
                                            <input class="form-control" name="tdp" value="<?PHP echo $ch[1];?>">
                                     <p class="help-block">Help text here.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Date debut</label>
                                            <input class="form-control" type="date" name="debut" value="<?PHP echo $ch[2];?>">
                                     <p class="help-block">Help text here.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Date fin</label>
                                            <input class="form-control" type="date" name="fin" value="<?PHP echo $ch[3];?>">
                                     <p class="help-block">Help text here.</p>
                                        </div>

                                            <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" rows="3" name="description" value="<?PHP echo $ch[4];?>"><?PHP echo $ch[4];?></textarea>
                                        </div>
                                  
                                 
                                        <button type="submit" class="btn btn-info"  name="Modif">Save </button>
                                        <?PHP } ?>
                                    </form>
                                    <?PHP } ?>
                            </div>
                        </div>
                            </div>

