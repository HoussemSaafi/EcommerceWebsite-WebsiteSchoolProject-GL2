<?php
include_once 'homePageLayout.php'
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">

                <div class="panel panel-info">
                    <div class="panel-heading"> <img src="../assets/images/add_product_icon.png">Ajouter produit </div>
                    <div class="panel-body">
                    <div style="Float: Left">
                     <form action="../Controllers/ajoutProduit.php" method="POST" enctype="multipart/form-data">

                    <fieldset>
                       
                                <p class="title">  <strong> Information produit : </strong></p>
                                
                                </p>

                               
                                 <p>
                                    <label style=" width: 150px; float: Left">Identifiant :</label>  <input  type="number" name="id" id="id" onkeyup="checkID()" />
                                    <p id="verif_ID"></p>
                                </p>
                                <p>
                                    <label style="width: 150px; float: Left">Nom produit : </label>  <input type="text" id="Desingation" name="Designation" onkeyup="checkName()"/>
                                    <p id="verif_Nom"></p>
                                </p>
                                <p>
                                    <label style=" width: 150px; float: Left">Prix :</label>  <input  type="text" id="prix" name="prix" />
                                </p>
                                <?php
                                include("../Services/CrudCategorie.php");
                                $c=new CrudCategorie();
                                $liste= $c->afficheCategorie($c->conn);
                                if(empty($liste))
                                {
                                    echo("<script>location = 'Afficher_Produit.php';</script>");
                                }
                                ?>
                                
                                <p>
                                    <label>Categorie</label><br>
                                    <select class="form-control" name="categorie" id="categorie">
                                        <?php
                                        foreach ($liste as $key => $value) {
                                            ?>
                                            <option><?php echo $value->DesignationCat;?> </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                               </p>

                                 <p>
                                    <label style=" width: 150px; float: Left">Quantité a ajouter :</label>  <input  type="number" name="quantite" id="quantite" />
                                </p>

                                <p>
                                    <label style=" width: 150px; float: Left">Quantité minimale :</label>  <input  type="number" name="quantite_min" id="quantite_min" onkeyup="verif_quantite_min()" />
                                    <p id="quantite_min_verif"></p>
                                </p>
                                <label style="display: block; width: 150px; float: Left" for="pays">Description :</label>
                                <FORM> <TEXTAREA style="FONT-SIZE: 12pt; WIDTH: 500px; height:200px; FONT-FAMILY: Verdana ; overflow-y: auto; resize: none;" rows=5 name="description" id="description"> </TEXTAREA> </FORM>
                                <br>
                                <p>
                                    <label for="img">Select image:</label>
                                    <input type="file" id="imagefile" name="imagefile" accept="image/*">
                                </p>
                        
                                <input type="submit" value="Appliquer" name="ajouter" id="ajouter">
                                <div id="erreur_envoi"></div>
                               
                                <br>

                </fieldset>
                 </form>
                </div>
                
                </div>
                </div>
                </div>
                </div>
                </div>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <div id="footer-sec">

    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="vendor/jquery/dist/jquery.min.js"></script>

    <script type="text/javascript" src="vendor/datatables/media/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="vendor/ng-file-upload/ng-file-upload-shim.min.js"></script>

    <script type="text/javascript" src="vendor/angular/angular.js"></script>

    ...

    <script type="text/javascript" src="vendor/ng-file-upload/ng-file-upload.js"></script>

    <script type="text/javascript" src="src/app/app.js"></script>

    <script type="text/javascript" src="src/app/client/client.js"></script>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script src="upload.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <script language="javascript" type="text/javascript">
            function fill_cat()
            {
                // Create our XMLHttpRequest object
                var hr = new XMLHttpRequest();
                // Create some variables we need to send to our PHP file
                var url = "load categorie.php";
                hr.open("POST", url, true);
                // Set content type header information for sending url encoded variables in the request
                hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                // Access the onreadystatechange event for the XMLHttpRequest object
                hr.onreadystatechange = function() {
                    if(hr.readyState == 4 && hr.status == 200) {
                        var return_data = hr.responseText;

                        document.getElementById("cat_div").innerHTML = return_data;

                    }
                }
                // Send the data to PHP now... and wait for response to update the status div
                hr.send(); // Actually execute the request

            }   
        </script>

        

        <script language="javascript" type="text/javascript">
            function checkID()
            {
                // Create our XMLHttpRequest object
                var hr = new XMLHttpRequest();
                // var url = "checkID.php";Create some variables we need to send to our PHP file
                
                var fn = document.getElementById("id").value;

                var url = "checkID.php?IDProduit="+fn;

                hr.open("POST", url, true);
                // Set content type header information for sending url encoded variables in the request
                hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                // Access the onreadystatechange event for the XMLHttpRequest object
                hr.onreadystatechange = function() {
                    if(hr.readyState == 4 && hr.status == 200) {
                        var return_data = hr.responseText;
                        
                        document.getElementById("verif_ID").innerHTML = return_data;

                    }
                }
                // Send the data to PHP now... and wait for response to update the status div
                hr.send(); // Actually execute the request

            }   
        </script>

        <script language="javascript" type="text/javascript">
            function checkName()
            {
                // Create our XMLHttpRequest object
                var hr = new XMLHttpRequest();
                // var url = "checkID.php";Create some variables we need to send to our PHP file
                
                var fn = document.getElementById("nom").value;

                var url = "checkName.php?Name="+fn;

                hr.open("POST", url, true);
                // Set content type header information for sending url encoded variables in the request
                hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                // Access the onreadystatechange event for the XMLHttpRequest object
                hr.onreadystatechange = function() {
                    if(hr.readyState == 4 && hr.status == 200) {
                        var return_data = hr.responseText;
                        
                        document.getElementById("verif_Nom").innerHTML = return_data;

                    }
                }
                // Send the data to PHP now... and wait for response to update the status div
                hr.send(); // Actually execute the request

            }   
        </script>

        <script language="javascript" type="text/javascript">
        function verif_quantite_min()
        {

            quantite=document.getElementById("quantite").value;
            quantite=Number(quantite);
            quantite_min=document.getElementById("quantite_min").value;
            quantite_min=Number(quantite_min);

            if (quantite_min>quantite)
            {
                document.getElementById("quantite_min_verif").innerHTML="Erreur : veuillez selectionnez une valeur inferieure a la quantite";
            }
            else
            {
                document.getElementById("quantite_min_verif").innerHTML="";
            }

        }
        </script>
        <script>

            document.querySelector('#ajouter').addEventListener('click', function(e) {


              var file = document.getElementById("imageProd").files[0];
              var file_size = document.getElementById("imageProd").value;
              var fd = new FormData();
              fd.append("afile", file);
              // These extra params aren't necessary but show that you can include other data.
              fd.append("username", "Groucho");

              var id=document.getElementById("id").value;
              var nom=document.getElementById("nom").value;
              var prix=document.getElementById("prix").value;
              
              var sel=document.getElementById("categorie");
              var categorie = sel.options[sel.selectedIndex].value;
             


              var quantite=document.getElementById("quantite").value;
              var quantite_min=document.getElementById("quantite_min").value;
              var description=document.getElementById("description").value;
              var url='ajouter produit.php?IDProduit='+id+'&nom='+nom+'&prix='+prix+'&categorie='+categorie+'&quantite='+quantite+'&QuantiteMin='+quantite_min+'&description='+description;

               console.log(url);
              
        if(nom!="" && prix!="" && quantite!="" && quantite_min!="" && description!="" && file_size!="")
        {
            if(document.getElementById("verif_ID").innerHTML!="ID deja utilisé" 
                && 
                document.getElementById("quantite_min_verif").innerHTML!="Erreur : veuillez selectionnez une valeur inferieure a la quantite" && document.getElementById("verif_Nom").innerHTML!="Nom deja utilisé")
            {
              var xhr = new XMLHttpRequest();
              xhr.open('POST',url, true);
              
              xhr.upload.onprogress = function(e) {
                if (e.lengthComputable) {
                  var percentComplete = (e.loaded / e.total) * 100;
                  console.log(percentComplete + '% uploaded');
                }
              };
              xhr.onload = function() {
                if (xhr.readyState == 4 && xhr.status == 200) 
                {
                  var return_data = xhr.responseText;

                    //document.getElementById("erreur_envoi").innerHTML = return_data;

                    window.alert("Ajout effectué avec succée !!");
                };
              };
              xhr.send(fd);
          }
          else
          {
            var erreur="Erreur :";
            if (document.getElementById("verif_ID").innerHTML=="ID deja utilisé")
            {
                erreur=erreur+"\n"+" - ID deja utilisée";
            }
            if (document.getElementById("verif_Nom").innerHTML=="Nom deja utilisé")
            {
                erreur=erreur+"\n"+" - Nom deja utilisée";
            }
            if (document.getElementById("quantite_min_verif").innerHTML=="Erreur : veuillez selectionnez une valeur inferieure a la quantite")
            {
                erreur=erreur+"\n"+" - Quantité minimale superieure a la quantité intiale";
            }
            window.alert(erreur);
          }
        }
        else
        {
            window.alert("Veuillez remplir tout les champs (image doit être inclue)");
        }

            }, false);
        </script>

</body>
</html>
