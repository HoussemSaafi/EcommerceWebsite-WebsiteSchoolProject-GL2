<?php
include'class.user.php';
include 'raccourciPanier.php';
include 'commande.php';




if (isset($_SESSION['user_session'])) {
    $user_id = $_SESSION['user_session'];

    $auth_user = new USER();
    $stmt = $auth_user->runQuery("SELECT * FROM client WHERE IDclient=:user_id");
    $stmt->execute(array(":user_id"=>$user_id));
    $auth_user->User_connecte($user_id);
    $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

}



$_SESSION['adresse']=$_POST['rue'].','.$_POST['ville'].','.$_POST['gouvernerat'].','.$_POST['zip'];

$c=new commande();
$p= $c->CalculerPrixTotale();
$p=round($p,2);
$_SESSION['prixtot']=$p;
// var_dump($_SESSION['panier']['idProduit']);
// var_dump($_SESSION['panier']['idProduit']);
ob_start();
//var_dump($p);

?>
<!DOCTYPE HTML>
<head>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <title>Free Home Shoppe Website Template | Home :: w3layouts</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="web/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="web/css/slider.css" rel="stylesheet" type="text/css" media="all"/>
    <script type="text/javascript" src="web/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="web/js/move-top.js"></script>
    <script type="text/javascript" src="web/js/easing.js"></script>
    <script type="text/javascript" src="web/js/startstop-slider.js"></script>
</head>
<body>
<div class="wrap">
    <div class="header">
        <div class="headertop_desc">
            <div class="call">
                <p><span>Need help?</span> call us <span class="number">1-22-3456789</span></span></p>
            </div>
            <div class="account_desc">
                <ul>

                    <?php
                    if(isset($_SESSION['user_session']))
                    {
                        ?>
                        <label class="h5">welcome : <?php print($userRow['username']); ?></label>
                        <li><a href="../EspaceClient/services/home.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Espace Client</a></li>

                        <li><a href="../EspaceClient/services/logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Se Déconnecter</a></li>


                        <?php
                    }

                    else
                    {
                        ?>
                        <li><a href="../EspaceClient/services/sign-up.php">Créer un compte</a></li>
                        <li><a href="../EspaceClient/services/index.php">Se connecter</a></li>


                        <?php

                    }
                    ?>

                </ul>
            </div>
            <div class="clear"></div>
        </div>
        <div class="header_top">
            <div class="logo">

            </div>
            <?php
            afficherPanier();

            ?>
            <script type="text/javascript">
                function DropDown(el) {
                    this.dd = el;
                    this.initEvents();
                }
                DropDown.prototype = {
                    initEvents : function() {
                        var obj = this;

                        obj.dd.on('click', function(event){
                            $(this).toggleClass('active');
                            event.stopPropagation();
                        });
                    }
                }

			$(function() {

				var dd = new DropDown( $('#dd') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown-2').removeClass('active');
				});

			});

		</script>
	 <div class="clear"></div>
  </div>
	<div class="header_bottom">
	     	<div class="menu">
	     		<ul>
			    	<li><a href="index.php">Acceuil</a></li>
			    	<li><a href="about.php">A propos</a></li>
			    	<li><a href="delivery.php">Livraison</a></li>
			    	<li><a href="news.php">Nouveauté</a></li>
			    	<li><a href="contact.php">Reclamation</a></li>
			    	<div class="clear"></div>
     			</ul>
	     	</div>
	     	<div class="search_box">
	     		<form>
	     			<input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}"><input type="submit" value="">
	     		</form>
	     	</div>
	     	<div class="clear"></div>
	     </div>
   </div>


                <style type="text/css">

                body { margin-top:20px; }
                .panel-title {display: inline;font-weight: bold;}
                .checkbox.pull-right { margin: 0; }
                .pl-ziro { padding-left: 0px; }
                </style>


                <div class="alert alert-info" role="alert">
                Choisissez le mode de paiement
                </div>


                <div class="container" style="margin-left: 38%">
                <div class="row">
                <div class="col-xs-12 col-md-4">

                <a class="btn btn-block btn-lg btn-info"></span>Prix Totale: <?php echo $_SESSION['prixtot'] ; ?> TND</a>
                <br><br>
                <br><br>
                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                <input name="amount" type="hidden" value="<?php echo $p; ?>" />
                <input name="currency_code" type="hidden" value="EUR" />
                <input name="shipping" type="hidden" value="8" />
                <input name="tax" type="hidden" value="0.00" />
                <input name="return" type="hidden" value="http://localhost:8080/home_shoppe-pack/ipn.php" />
                <input name="cancel_return" type="hidden" value="http://localhost:8080/home_shoppe-pack/choisirmodePaiement.php" />
                <input name="notify_url" type="hidden" value="http://localhost:8080/home_shoppe-pack/ipn.php" />
                <input name="cmd" type="hidden" value="_xclick" />
                <input name="business" type="hidden" value="khalil.guibene-facilitator@esprit.tn" />
                <input name="item_name" type="hidden" value="Prix total" />
                <input name="no_note" type="hidden" value="1" />
                <input name="lc" type="hidden" value="FR" />
                <input name="bn" type="hidden" value="PP-BuyNowBF" />
                <input name="custom" type="hidden" value="var1=1" />
                <input type="submit" value="Payer Avec Paypal" class="btn btn-primary btn-lg btn-block">
                </form>







                <br/>
                <form action ="creationcommande.php" method="POST">

                <input name="submit" class="btn btn-success btn-lg btn-block" type="submit" value="Payer lors de la livraison "></form>
                </form>
                </div>
                </div>
                </div>







                <script type="text/javascript">
                $(document).ready(function () {
                    $('#horizontalTab').easyResponsiveTabs({
                        type: 'default', //Types: default, vertical, accordion
                        width: 'auto', //auto or any width like 600px
                        fit: true   // 100% fit in a container
                    });
                });
            </script>

            <div class="section group">

            </div>
        </div>
    </div>
</div>

<div class="footer">
    <div class="wrap">
        <div class="section group">
            <div class="col_1_of_4 span_1_of_4">
                <h4>Information</h4>
                <ul>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="contract.php">Customer Service</a></li>
                    <li><a href="#">Advanced Search</a></li>
                    <li><a href="delivery.html">Orders and Returns</a></li>
                    <li><a href="contract.php">Contact Us</a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>Why buy from us</h4>
                <ul>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="contract.php">Customer Service</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="contract.php">Site Map</a></li>
                    <li><a href="#">Search Terms</a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>My account</h4>
                <ul>
                    <li><a href="contract.php">Sign In</a></li>
                    <li><a href="index.html">View Cart</a></li>
                    <li><a href="#">My Wishlist</a></li>
                    <li><a href="#">Track My Order</a></li>
                    <li><a href="contract.php">Help</a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>Contact</h4>
                <ul>
                    <li><span>+91-123-456789</span></li>
                    <li><span>+00-123-000000</span></li>
                </ul>
                <div class="social-icons">
                    <h4>Follow Us</h4>
                    <ul>
                        <li><a href="#" target="_blank"><img src="web/images/facebook.png" alt="" /></a></li>
                        <li><a href="#" target="_blank"><img src="web/images/twitter.png" alt="" /></a></li>
                        <li><a href="#" target="_blank"><img src="web/images/skype.png" alt="" /> </a></li>
                        <li><a href="#" target="_blank"> <img src="web/images/dribbble.png" alt="" /></a></li>
                        <li><a href="#" target="_blank"> <img src="web/images/linkedin.png" alt="" /></a></li>
                        <div class="clear"></div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copy_right">
        <p>Company Name © All rights Reseverd | Design by  <a href="http://w3layouts.com">W3Layouts</a> </p>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<a href="#" id="toTop"><span id="toTopHover"> </span></a>
</body>
</html>
