<?php
include_once 'homePageLayout.php'
?>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">

                <div class="panel panel-info">
                    <div class="panel-heading"> <img src="add_product_icon.png">Ajouter produit </div>
                    <div class="panel-body">
                    <div style="Float: Left">
                     <form method="POST" action="../Controllers/ajoutCategorie.php" enctype='multipart/form-data'>

                    <fieldset>
                       
                                <p class="title">  <strong> Information produit : </strong></p>
                                
                                </p>

                               
                                 <p>
                                    <label style=" width: 150px; float: Left">Nom Categorie :</label>  <input  type="text" name="NomCat" id="NomCat" onkeyup="checkCat()" />
                                    <p id="verifCat"></p>
                                </p>

                                <label style="display: block; width: 150px; float: Left" for="pays">Description :</label>
                                <FORM> <TEXTAREA style="FONT-SIZE: 12pt; WIDTH: 500px; height:200px; FONT-FAMILY: Verdana ; overflow-y: auto; resize: none;" rows=5 name="description" id="description"> </TEXTAREA> </FORM>
                                <br>
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

    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script src="upload.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="../assets/js/custom.js"></script>

        <script language="javascript" type="text/javascript">
            function checkCat()
            {
                // Create our XMLHttpRequest object
                var hr = new XMLHttpRequest();
                // var url = "checkID.php";Create some variables we need to send to our PHP file
                
                var fn = document.getElementById("NomCat").value;

                var url = "checkCat.php?NomCat="+fn;

                hr.open("POST", url, true);
                // Set content type header information for sending url encoded variables in the request
                hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                // Access the onreadystatechange event for the XMLHttpRequest object
                hr.onreadystatechange = function() {
                    if(hr.readyState == 4 && hr.status == 200) {
                        var return_data = hr.responseText;
                        
                        document.getElementById("verifCat").innerHTML = return_data;

                    }
                }
                // Send the data to PHP now... and wait for response to update the status div
                hr.send(); // Actually execute the request

            }   
        </script>

        <script>

            document.querySelector('#ajouter').addEventListener('click', function(e) {

            var NomCat=document.getElementById("NomCat").value;
            var description=document.getElementById("description").value;
            var url='ajouter categorie.php?NomCat='+NomCat+'&Description='+description;
              
        if(NomCat!="" && description!="")
        {
            if(document.getElementById("verifCat").innerHTML!="Categorie deja crée")
            {
              var xhr = new XMLHttpRequest();
              xhr.open('POST',url, true);
              
              xhr.onload = function() {
                if (xhr.readyState == 4 && xhr.status == 200) 
                {
                  var return_data = xhr.responseText;
                  document.getElementById("erreur_envoi").innerHTML=return_data;

                    //document.getElementById("erreur_envoi").innerHTML = return_data;

                    window.alert("Ajout effectué avec succée !!");
                };
              };
              xhr.send();
          }
          else
          {
            var erreur="Erreur :";
            if (document.getElementById("verifCat").innerHTML=="Categorie deja crée")
            {
                erreur=erreur+"\n"+" - Categorie deja crée";
            }

            window.alert(erreur);
          }
        }
        else
        {
            window.alert("Veuillez remplir tout les champs");
        }

            }, false);
        </script>

</body>
</html>
