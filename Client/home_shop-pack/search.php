
<?php
require("HeaderLayout.php");
/*include 'class.user.php';
session_start();
	if (isset($_SESSION['user_session'])) 
	{
	$user_id = $_SESSION['user_session'];
	$auth_user = new USER();
	$stmt = $auth_user->runQuery("SELECT * FROM client WHERE IDclient=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
     $auth_user->User_connecte($user_id);
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);}*/

	    $conn=ConnexionBD::getInstance();
	    $keyword=$_GET['keyword'] ;
        $keywords = explode(' ', $keyword);
        $search_string="SELECT * from produit where ";
       foreach ($keywords as $word) {
           $search_string .= "Designation LIKE '%" .$word. "%' OR ";
       }
$search_string = substr($search_string, 0, strlen($search_string)-4);
          $count_results = $conn->query($search_string);

           $rows = $count_results->fetchAll();

        $num=count($rows);
        $rpp=10;
        $last_page=ceil($num/$rpp);
        $page_number=1;
        $search_string1 ="SELECT Designation from produit where ";
foreach ($keywords as $word) {
    $search_string1.="Designation LIKE '%" . $word . "%' OR ";

    }
     $search_string1 = substr($search_string1, 0, strlen($search_string1)-4);
    $name = $conn->query($search_string1 ." ORDER BY Designation DESC LIMIT " . $rpp * ($page_number - 1) . "," . $rpp);

    $result = $name->fetchAll(PDO::FETCH_NUM);

?>


    <script language="Javascript" type="text/javascript">

        function submit(np)
        {
            // Create our XMLHttpRequest object
            var hr = new XMLHttpRequest();
            // Create some variables we need to send to our PHP file
            var url = "ajax recherche.php";
            var ln = document.getElementById("keyword").value;
            var vars = "?keyword="+ln+"&pagenum="+np;
            url=url+vars;
            hr.open("POST", url, true);
            // Set content type header information for sending url encoded variables in the request
            hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            // Access the onreadystatechange event for the XMLHttpRequest object
            hr.onreadystatechange = function() {
                if(hr.readyState == 4 && hr.status == 200) {
                    var return_data = hr.responseText;
                    document.getElementById("catalog_results").innerHTML = return_data;
                    console.log(return_data);
                    /*
                    if(return_data.indexOf('ok')!=-1)
                    {
                        window.location="http://stackoverflow.com";

                    }
        */}}
            // Send the data to PHP now... and wait for response to update the status div
            hr.send(); // Actually execute the request
        }
    </script>

<body onload="submit(1)">
<p id="firstsearchkeyword" hidden><?php echo $_GET["keyword"]; ?></p>
  <div class="wrap">
	<div class="header">
		<div class="headertop_desc">
			<div class="call">
                <p><span>Need help?</span> call us <span class="number">1-22-3456789</span></span></p>
			</div>
			<div class="account_desc">
				<ul>
                    <?php 
                    	if(isset($_SESSION['user_session'])) {?>
                    			 <label class="h5">welcome : <?php print($userRow['username']); ?></label>
                    		    <li><a href="../EspaceClient/sevices/home.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Espace Client</a></li>
                				<li><a href="../EspaceClient/sevices/logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Se Déconnecter</a></li>
                		<?php  } else { ?>
					<li><a href="../EspaceClient/sevices/sign-up.php">Créer un compte</a></li>
					<li><a href="../EspaceClient/sevices/index.php">Se connecter</a></li>
               <?php } ?>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="header_top">
			<div class="logo">
				<a href="index.html"><img src="web/images/logo.png" alt="" /></a>
			</div>
			  <?php  afficherPanier(); ?>
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
					});}}
			$(function(){
				var dd = new DropDown( $('#dd') );
				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown-2').removeClass('active');
				});});
		</script>

 <div class="main">
     <p id="firstsearchkeyword" hidden><?php echo $_GET["keyword"]; ?></p>

     <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Products Search :</h3>
    		</div>
    		<div class="see">
    			<p><a href="#">See all Products</a></p>
    		</div>
    		<div class="clear"></div>
    	</div>

    	<div class="slection group">
    		</br>
	      	<label> Keyword : </label>
	    <div class="form-group">
          <input type="text" name="keyword" id="keyword" class="form-control" value="<?php echo $_GET["keyword"]; ?>" placeholder="Search" onkeyup="submit()">
        </div>

			<div id="catalog_results" class ="selection group"></div>
		</div>


			<div class="content_bottom">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="see">
    			<p><a href="#">See all Products</a></p>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php
                  $promotion=$conn->query("SELECT IDProduit FROM promotion");
                  $promotion=$promotion->fetchAll();
				  $result=$conn->query("SELECT * FROM produit join promotion on produit.Ref=promotion.IDProduit ORDER BY promotion.DateFin DESC  limit 4");
		          $res=$result->fetchAll();
		          
		          foreach($res as $r)
		          {
		          	$exist=0;
		            echo '<div class="grid_1_of_4 images_1_of_4">';
		            echo '<a href="preview.php?IDProduit='.$r['Ref'].'"><div style="width: 250px; height: 250px;;overflow:hidden"><img  src="data:image/jpeg;base64,'.base64_encode($r['ImgProduit']).'" /></div></a>';
		            echo ' <h2>'.$r['Designation'].' </h2>';
		            echo '<div class="price-details">';
		            echo '<div class="price-number">';
		            foreach ($promotion as $prom) {
                        if($prom['IDProduit']==$r['Ref']){
                        $exist=1;
                        
                        }     
                    }
    				
                    if($exist==1){echo '<p style="text-decoration: line-through"><span class="rupees">'.$r['PrixHT'].' DT</span></p>';
                     $tauxprom=$conn->query("SELECT TauxDeProm FROM promotion where IDProduit=".$r['Ref']);
                     $tauxprom=$tauxprom->fetch();
                    $newPrice=$r['PrixHT'] - ($r['PrixHT']*$tauxprom[0]/100);
                    echo '<p><span class="rupees">'.$newPrice.' DT</span></p>';
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

