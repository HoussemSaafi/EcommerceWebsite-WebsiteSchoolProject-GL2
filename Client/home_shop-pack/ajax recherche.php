<?php

/*********************************************************************************************************************/
//1- établir la cnx avec la base de données
//2- récupérer les informations depuis le formulaire
//3- créer un objet chauffeur et l'insérer dans la base [méthode d'insertion dans la base dans la classe chauffeur ]
/*********************************************************************************************************************/
/*

	if(empty($_POST['login']) || empty($_POST['Password']))
	{
		if(empty($_POST['login']))
		{
			echo "ERREUR : champ login non remplit ! \n";
		}
		if(empty($_POST['Password']))
		{
			echo "ERREUR : champ Password non remplit !";
		}
	}
	else
	{
		*/

//require_once('../EspaceClient/classes/ConnexionBD.php');
require_once('../../Administrator/classes/ConnexionBD.php');

$conn=ConnexionBD::getInstance();
$keyword=$_GET['keyword'] ;
$keywords = explode(' ', $keyword);
$search_string="SELECT * from produit where ";

foreach ($keywords as $word) {
	$search_string .= "Designation LIKE '%" . $word . "%' OR ";
}
     $search_string = substr($search_string, 0, strlen($search_string)-4);
     $count_results=$conn->query($search_string);
     $rows=$count_results->fetchAll();


		$num=count($rows);

		$rpp=4;

		$last_page=ceil($num/$rpp);
		 if($last_page<1)
		 {
		 	$last_page=1;
		 }

		$page_number=$_GET['pagenum'];

		if($page_number<1)
		{
			$page_number=1;
		}
		if($page_number>$last_page)
		{
			$page_number=$last_page;
		}
		$promotion=$conn->query("SELECT IDProduit FROM promotion");
        $promotion=$promotion->fetchAll();
       $keywords = explode(' ', $keyword);
       $search_string1="SELECT * from produit where ";
      foreach ($keywords as $word) {
		  $search_string1 .= "Designation LIKE '%" . $word . "%' OR ";
	  }
$search_string1 = substr($search_string1, 0, strlen($search_string1)-4);

		$name=$conn->query($search_string1. " ORDER BY Designation DESC LIMIT " . $rpp * ($page_number - 1) . "," . $rpp);
		$result=$name->fetchAll();
		if (count($result)!=0)
		{
		echo '<div id="catalog_results" class ="selection group">';
		foreach($result as $r)
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
		}
		echo '</div>';
		echo '<div class="btn-group" role="group" aria-label="...">';
		for ($i=1 ; $i<=$last_page;$i++)
		{
		    echo '<input type="button" class="btn btn-default" onclick="submit('.$i.')" value="'.$i.'">';
		    echo "\n";
		}

		}

		else
		{
			echo "<p>Pas de resultat disponible</p>";
		}
		echo '</div>'


		/*
	}

*/
?>

