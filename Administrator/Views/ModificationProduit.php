<?php
include_once 'homePageLayout.php'
?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="panel panel-info">
            <div class="panel-heading"><img src="add_product_icon.png">Modifier le produit</div>
            <div class="panel-body">
                <?php
                include_once '../autoload.php';
                $bdd = ConnexionBD::getInstance();
                $req = 'SELECT * FROM produit WHERE Ref = :id';
                $reponse = $bdd->prepare($req);
                $reponse->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
                $selectIsOK = $reponse->execute();
                $produit = $reponse->fetch();
              //  var_dump($produit);
                ?>
                <fieldset>

                    <p class="title"><strong> Information produit : </strong></p>
                    <form action="../Controllers/modifierProduit.php" method="post">
                        <input type="hidden" name="id" value="<?= $produit['Ref'] ?>">
                        <div class="form-group">
                            <label>Product Name</label>
                            <input
                                    name="Designation"
                                    class="form-control"
                                    id="Desingnation"
                                    value="<?= $produit['Designation'] ?>"
                            <small id="designation" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label>Product Price</label>
                            <input style=" width: 150px; float: Left"
                                   type="number"
                                   name="PrixHT"
                                   class="form-control"
                                   id="PrixHT"
                                   value="<?= $produit['PrixHT'] ?>"
                            <small id="PrixHT" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label>Product Description</label>
                            <input style="FONT-SIZE: 10pt; WIDTH: 500px; height:100px; FONT-FAMILY: Verdana ; resize: none;"
                                   type="text"
                                   name="Description"
                                   class="form-control"
                                   id="Description"
                                   value="<?= $produit['Description'] ?>"
                            <small id="Description" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label>Product Quantity</label>
                            <input
                                    type="number"
                                    name="Quantite"
                                    class="form-control"
                                    id="Quantite"
                                    style="display: block; width: 150px; float: Left" for="pays"
                                    value="<?= $produit['Quantite'] ?>"
                            <small id=Quantite" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label>Product minimal Quantity</label>
                            <input
                                    type="number"
                                    name="QuantiteMin"
                                    class="form-control"
                                    id="QuantiteMin"
                                    style="display: block; width: 150px; float: Left" for="pays"
                                    value="<?= $produit['QuantiteMin'] ?>"
                            <small id=QuantiteMin" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label>Product Category</label>
                            <input
                                    style="display: block; width: 150px; float: Left" for="pays"
                                    name="ID_Categorie"
                                    class="form-control"
                                    id="ID_Categorie"
                                    style="display: block; width: 150px; float: Left" for="pays"
                                    value="<?= $produit['ID_Categorie'] ?>"
                            <small id=ID_Categorie" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label>Product Image</label>
                            <input type="file" id="imageProd" name="imageProd" accept="image/*" />
                            <small id=imageProd" class="form-text text-muted"></small>
                        </div>
                        <button type="submit" class="btn btn-primary"> update</button>
                    </form>
                    <script language="javascript" type="text/javascript">
                        function checkID() {
                            // Create our XMLHttpRequest object
                            var hr = new XMLHttpRequest();
                            // var url = "checkID.php";Create some variables we need to send to our PHP file

                            var fn = document.getElementById("ref").value;

                            var url = "checkID.php?IDProduit=" + fn;

                            hr.open("POST", url, true);
                            // Set content type header information for sending url encoded variables in the request
                            hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                            // Access the onreadystatechange event for the XMLHttpRequest object
                            hr.onreadystatechange = function () {
                                if (hr.readyState == 4 && hr.status == 200) {
                                    var return_data = hr.responseText;

                                    document.getElementById("verif_ID").innerHTML = return_data;

                                }
                            }
                            // Send the data to PHP now... and wait for response to update the status div
                            hr.send(); // Actually execute the request

                        }
                    </script>

                    <script language="javascript" type="text/javascript">
                        function checkName() {
                            // Create our XMLHttpRequest object
                            var hr = new XMLHttpRequest();
                            // var url = "checkID.php";Create some variables we need to send to our PHP file

                            var fn = document.getElementById("nom").value;

                            var url = "checkName.php?Name=" + fn;

                            hr.open("POST", url, true);
                            // Set content type header information for sending url encoded variables in the request
                            hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                            // Access the onreadystatechange event for the XMLHttpRequest object
                            hr.onreadystatechange = function () {
                                if (hr.readyState == 4 && hr.status == 200) {
                                    var return_data = hr.responseText;

                                    document.getElementById("verif_Nom").innerHTML = return_data;

                                }
                            }
                            // Send the data to PHP now... and wait for response to update the status div
                            hr.send(); // Actually execute the request

                        }
                    </script>


                    <script language="javascript" type="text/javascript">
                        function modifier() {


                            // Create our XMLHttpRequest object
                            var hr = new XMLHttpRequest();
                            // var url = "checkID.php";Create some variables we need to send to our PHP file

                            var id = document.getElementById("id").innerHTML;
                            console.log(id);
                            var ref = document.getElementById("ref").value;
                            console.log(ref);
                            var nom = document.getElementById("nom").value;
                            console.log(nom);
                            var prix = document.getElementById("prix").value;

                            var sel = document.getElementById("categorie");

                            var categorie = sel.options[sel.selectedIndex].value;
                            console.log(categorie);


                            var quantite = document.getElementById("quantite").value;
                            console.log(quantite);
                            var quantite_min = document.getElementById("QuantiteMin").value;
                            console.log(quantite_min);
                            var description = document.getElementById("description").value;
                            console.log(description);

                            var url = 'ModifProduit.php?IDProduit=' + id + '&ref=' + ref + '&nom=' + nom + '&prix=' + prix + '&categorie=' + categorie + '&quantite=' + quantite + '&QuantiteMin=' + quantite_min + '&description=' + description;

                            if (nom != "" && prix != "" && quantite != "" && quantite_min != "" && description != "" && ref != "") {
                                if (document.getElementById("verif_ID").innerHTML != "ID deja utilisé"
                                    && document.getElementById("verif_ID").innerHTML != "veillez inserer une valeur numerique" &&
                                    document.getElementById("quantite_min_verif").innerHTML != "Erreur : veuillez selectionnez une valeur inferieure a la quantite" && document.getElementById("verif_Nom").innerHTML != "Nom deja utilisé") {
                                    hr.open("POST", url, true);
                                    // Set content type header information for sending url encoded variables in the request
                                    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                    // Access the onreadystatechange event for the XMLHttpRequest object
                                    hr.onreadystatechange = function () {
                                        if (hr.readyState == 4 && hr.status == 200) {
                                            var return_data = hr.responseText;

                                            document.getElementById("err").innerHTML = return_data;
                                            window.alert("Mofication effectuée");

                                        }
                                    }
                                    // Send the data to PHP now... and wait for response to update the status div
                                    hr.send(); // Actually execute the request
                                } else {
                                    var erreur = "Erreur :";
                                    if (document.getElementById("verif_ID").innerHTML == "ID deja utilisé") {
                                        erreur = erreur + "\n" + " - ID deja utilisée";
                                    }
                                    if (document.getElementById("verif_Nom").innerHTML == "Nom deja utilisé") {
                                        erreur = erreur + "\n" + " - Nom deja utilisée";
                                    }
                                    if (document.getElementById("quantite_min_verif").innerHTML == "Erreur : veuillez selectionnez une valeur inferieure a la quantite") {
                                        erreur = erreur + "\n" + " - Quantité minimale superieure a la quantité intiale";
                                    }
                                    if (document.getElementById("quantite_min_verif").innerHTML == "veillez inserer une valeur numerique") {
                                        erreur = erreur + "\n" + " - veillez inserer une valeur numerique";
                                    }
                                    window.alert(erreur);
                                }

                            } else {
                                window.alert("Veuillez remplir tout le champ");
                            }

                        }

                    </script>

                    <script language="javascript" type="text/javascript">
                        function verif_quantite_min() {

                            quantite = document.getElementById("quantite").value;
                            quantite = Number(quantite);
                            quantite_min = document.getElementById("QuantiteMin").value;
                            quantite_min = Number(quantite_min);

                            if (quantite_min > quantite) {
                                document.getElementById("quantite_min_verif").innerHTML = "Erreur : veuillez selectionnez une valeur inferieure a la quantite";
                            } else {
                                document.getElementById("quantite_min_verif").innerHTML = "";
                            }

                        }
                    </script>
                    <!-- METISMENU SCRIPTS -->
                    <script src="../assets/js/jquery.metisMenu.js"></script>
                    <!-- CUSTOM SCRIPTS -->
                    <script src="../assets/js/custom.js"></script>