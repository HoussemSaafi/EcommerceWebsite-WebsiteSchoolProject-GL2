<?php
require ("HeaderLayout.php"); ?>
        <div class="header_slide">
            <div class="header_bottom_left">
                <div class="categories">
                    <ul>
                        <h3>Categories</h3>
                        <?php



                        $req1="SELECT * from categorie";
                        $result_Cat=$conn->query($req1);
                        $result=$result_Cat->fetchAll();



                        foreach($result as $prod)
                        {
                            echo'<li><a href="show categorie.php?keyword='.$prod['DesignationCat'].'">'.$prod['DesignationCat'].'</a></li>';



                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="header_bottom_right">
                <div class="slider">
                    <div id="slider">
                        <div id="mover">
                            <div id="slide-1" class="slide">
                                <div class="slider-img">
                                    <a href="see all products.php"><img src="Client/home_shop-pack/mobile/images/promo.jpg" alt="learn more" /></a>
                                </div>
                                <div class="slider-text">
                                    <h1>Clearance<br><span>SALE</span></h1>
                                    <h2>UPTo 20% OFF</h2>
                                    <div class="features_list">
                                        <h4>Get to Know More About Our Memorable Services Lorem Ipsum is simply dummy text</h4>
                                    </div>
                                    <a href="see all products.php" class="button">Shop Now</a>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="slide">
                                <div class="slider-text">
                                    <h1>Clearance<br><span>SALE</span></h1>
                                    <h2>UPTo 40% OFF</h2>
                                    <div class="features_list">
                                        <h4>Get to Know More About Our Memorable Services</h4>
                                    </div>
                                    <a href="see all products.php"class="button">Shop Now</a>
                                </div>
                                <div class="slider-img">
                                    <a href="see all products.php"><img src="../web/images/slide-3-image.jpg" alt="learn more" /></a>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="slide">
                                <div class="slider-img">
                                    <a href="see all products.php"><img src="../web/images/slide-2-image.jpg" alt="learn more" /></a>
                                </div>
                                <div class="slider-text">
                                    <h1>Clearance<br><span>SALE</span></h1>
                                    <h2>UPTo 10% OFF</h2>
                                    <div class="features_list">
                                        <h4>Get to Know More About Our Memorable Services Lorem Ipsum is simply dummy text</h4>
                                    </div>
                                    <a href="see all products.php" class="button">Shop Now</a>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>

            <div class="header_top">
                <div class="logo">

                </div>

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


            <?php

            $imagefile=$conn->query("SELECT  promotion.IDProduit,produit.ImgProduit,promotion.TauxDeProm,promotion.DateDebut,promotion.DateFin,
          	promotion.Description from produit inner join promotion on produit.Ref=promotion.IDProduit ORDER BY promotion.DateFin DESC  limit 3");
            $result=$imagefile->fetchAll(PDO::FETCH_NUM);

            // foreach($result as $the_image)
            //  { <?php echo $the_image[0]
            //  echo '<img src="data:image/jpeg;base64,'.base64_encode($the_image[0]).'" />';
            //} IDProduit in (select IDProduit from Promotion)")


            ?>
            <div class="header_bottom_right">
                <div class="slider">
                    <div id="slider">
                        <div id="mover">
                            <?php 	foreach($result as $the_image) {?>




                                <div id="slide-1" class="slide">
                                    <div class="slider-img">
                                        <a href="../home_shop-pack/mobile/preview.html"><?php echo ' <img alt="learn more" src="data:image;base64,'.$the_image[1].'" />'?></a>
                                    </div>
                                    <div class="slider-text">
                                        <h1>Clearance<br><span>SALE</span></h1>
                                        <h2>UPTo <?php echo $the_image[2] ?>% OFF</h2>
                                        <div class="features_list">
                                            <h4><?php echo $the_image[5] ?></h4>
                                        </div>
                                        <a href="preview.php?IDProduit=<?php echo $the_image[0] ;?>" class="button">Shop Now</a>
                                    </div>
                                    <div class="clear"></div>
                                </div>

                            <?php } ?>





                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="main">
        <div class="content">
            <div class="content_top">
                <div class="heading">
                    <h3>New Products</h3>
                </div>
                <div class="see">
                    <p><a href="see all products.php">See all Products</a></p>
                </div>
                <div class="clear"></div>
            </div>
            <div class="section group">

                <?php

                $promotion=$conn->query("SELECT IDProduit FROM promotion");
                $promotion=$promotion->fetchAll();
                $result=$conn->query("SELECT * FROM produit ");
                $res=$result->fetchAll();

                foreach($res as $r)
                {
                    $exist=0;
                    echo '<div class="grid_1_of_4 images_1_of_4">';
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
            <div class="content_bottom">
                <div class="heading">
                    <h3>Feature Products</h3>
                </div>
                <div class="see">
                    <p><a href="see%20all%20products.php">See all Products</a></p>
                </div>
                <div class="clear"></div>
            </div>
            <div class="section group">
                <?php

                $promotion=$conn->query("SELECT IDProduit FROM promotion");
                $promotion=$promotion->fetchAll();
                $result=$conn->query("SELECT * FROM produit join promotion on produit.Ref=promotion.IDProduit ORDER BY promotion.DateDebut DESC  limit 4");
                $res=$result->fetchAll();

                foreach($res as $r)
                {
                    $exist=0;
                    echo '<div class="grid_1_of_4 images_1_of_4">';
                    echo '<a href="preview.php?Ref='.$r['Ref'].'"><div style="width: 250px; height: 250px;;overflow:hidden"><img src="data:image;base64,'.$r['ImgProduit'].'"style=max-width:300px;width:100% /></div></a>';
                    echo ' <h2>'.$r['Designation'].' </h2>';
                    echo '<div class="price-details">';
                    echo '<div class="price-number">';
                    foreach ($promotion as $prom) {
                        if($prom['IDProduit']==$r['Ref']){
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
                    echo '<h4><a href="preview.php?IDProduit='.$r['IDProduit'].'">Inspect</a></h4>';
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
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<script type="text/javascript">
    function search()
    {
        keyword=document.getElementById("keywordSearch").value;
        window.location.href = "search.php?keyword="+keyword+"&pagenum=1";
    }
</script>
<a href="#" id="toTop"><span id="toTopHover"> </span></a>
</body>
</html>