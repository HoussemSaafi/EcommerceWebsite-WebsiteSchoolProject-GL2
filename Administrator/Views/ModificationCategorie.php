<?php
include_once 'homePageLayout.php'
?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper" xmlns="http://www.w3.org/1999/html">
    <div id="page-inner">
        <div class="panel panel-info">
            <div class="panel-heading"><img src="add_product_icon.png">Modifier le produit</div>
            <div class="panel-body">
                <?php
                include_once '../autoload.php';
                $bdd = ConnexionBD::getInstance();
                $req = 'SELECT * FROM categorie WHERE DesignationCat = :IDCategorie';
                $reponse = $bdd->prepare($req);
                $reponse->bindValue(':IDCategorie', $_GET['IDCategorie'], PDO::PARAM_INT);
                $selectIsOK = $reponse->execute();
                $categorie = $reponse->fetch();
                //var_dump($categorie);
                ?>
                <fieldset>

                    <p class="title"><strong> Category Information : </strong></p>
                    <form action="../Controllers/modifierCategorie.php" method="post">
                        <input name="DesignationCat" value="<?= $categorie['DesignationCat'] ?>">
                        <div class="form-group">
                            <label>Category Description</label>
                            <input
                                    name="Description"
                                    class="form-control"
                                    id="Description"
                                    value="<?= $categorie['Description'] ?>" </input>
                            <small id="Description" class="form-text text-muted"></small>
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
