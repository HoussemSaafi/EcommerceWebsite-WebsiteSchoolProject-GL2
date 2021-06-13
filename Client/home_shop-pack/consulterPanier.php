<?php


require ("HeaderLayout.php");
	$_SESSION['thispage']="consulterPanier.php";
$conn=ConnexionBD::getInstance();

	?>
<style>
    .swiper-slide{
        background-position: center;
        background-size: cover;
        width: 250px;
        height:350px ;
    }


</style>
<br><br>
<br><br>

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Modify</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                  
 <?php
         if(isset($_SESSION['panier'])&&count($_SESSION['panier']['idProduit'])>0)
      {
foreach ($_SESSION['panier']['idProduit'] as $key => $value) {
      	?>
                    <tr>
                    <form action="modifierPanier.php" method = post>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#"><?php echo $value; ?></a></h4>
                               
                                <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="number" class="form-control" name="quantite" placeholder=<?php 
                            echo $_SESSION['panier']['qte'][$key];
                         ?>>
                        </td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="hidden" name ="idProduit" value=<?php 
                            echo $value;
                            ?>></input>
                        <button type="submit" class="btn btn-primary"><i  class="glyphicon glyphicon-pencil"></i></button>

                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?php 
                            echo $_SESSION['panier']['prixProduit'][$key];
                            ?> TND</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?php 
                            echo $_SESSION['panier']['prixProduit'][$key]*$_SESSION['panier']['qte'][$key];
                            ?> TND</strong></td>
                        <td class="col-sm-1 col-md-1">
                        <a href=<?php 
			  	   				echo '"supprimerArticle.php?idProduit='.$value.'"';
			  	   			 ?> class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </a></td>
                    </tr>
                    </form>
                    <?php }?>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong>

                        <?php
                        $prix=0;
                        foreach ($_SESSION['panier']['idProduit'] as $key => $value) {
                            $prix+= $_SESSION['panier']['prixProduit'][$key]*$_SESSION['panier']['qte'][$key];

                        }
                            echo $prix;
                        ?> TND</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Estimated shipping</h5></td>
                        <td class="text-right"><h5><strong>8 TND</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong><?php echo $prix+8; ?> TND</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <a href="index.php" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </a></td>
                        <td>
                        <a href="validerPanier.php" class="btn btn-success">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

 <?php 
          }

           

           else
           {

            ?>
            <br><br>
            <br><br>
            <br><br>
            <div class="jumbotron">
            <h1>Panier Vide</h1>
             <p></p>
             <p><a class="btn btn-primary btn-lg" href="index.php" role="button">Continuer Les Achats</a></p>
             </div>
            <?php
           }


               ?>








         
           
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


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
   <div class="content_bottom">
    		<div class="heading">
    		<h3>Related Products</h3>
    		</div>
    		<div class="see">
    			<p><a href="see all products.php">See all Products</a></p>
    		</div>
    		<div class="clear"></div>
    	</div>
<br>
<br>
<div class="section group">
    <div class="swiper-container">
        <div class="swiper-wrapper">
<?php

$promotion=$conn->query("SELECT IDProduit FROM promotion");
$promotion=$promotion->fetchAll();
$result=$conn->query("SELECT * FROM produit ");
$res=$result->fetchAll();

foreach($res as $r)
{
    $exist=0;
    echo '<div class="swiper-slide"   style=“display:bloc;margin-left:100px >';
    echo '<a href="preview.php?IDProduit='.$r['Ref'].'"><div style="width: 250px; height: 250px;;overflow:hidden"><img src="data:image;base64,'.$r['ImgProduit'].'"style=max-width:300px;width:100% /></div></a>';
    echo ' <h2>'.$r['Designation'].' </h2>';
    echo '<div class="price-details">';
    echo '<div class="price-number">';
    foreach ($promotion as $prom) {
        if($prom['IDProduit']==$r['IDProduit']){
            $exist=1;

        }
    }

    if($exist==1){echo '<p style="text-decoration: line-through"><span class="rupees">'.$r['PrixHT'].' DT</span></p>';
        $tauxprom=$conn->query("SELECT TauxDeProm FROM promotion where IDProduit=".$r['IDProduit']);
        $tauxprom=$tauxprom->fetch();
        $newPrice=$r['PrixHT'] - ($r['PrixHT']*$tauxprom[0]/100);
        echo '<p><span class="rupees" style="Color:red">'.$newPrice.' DT</span></p>';
    }
    else{
        echo '<p><span class="rupees">'.$r['PrixHT'].' DT</span></p>';
    }

    echo '</div>';
    echo '<div class="add-cart">';
    echo '<h4><a href="preview.php?IDProduit='.$r['Ref'].'">Inspect</a></h4>';
    echo '</div>';
    echo '<div class="clear"></div>';
    echo '</div>';
    echo '</div>';

}  ?>

            </div>
        </div>
    </div>
</div>

<?php   require("footerLayout.php");  ?>
   <script type="text/javascript">
		$(document).ready(function() {			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        coverflowEffect: {
            rotate:15,
            stretch: 0,
            depth:20 ,
            modifier: 1,
            speed: 200 ,
            slideShadows: false,
            breakpoint: 768,

        },
        pagination: {
            el: '.swiper-pagination',
        },
    });
</script>
    <a href="#" id="toTop"><span id="toTopHover"> </span></a>
</body>
</html>

