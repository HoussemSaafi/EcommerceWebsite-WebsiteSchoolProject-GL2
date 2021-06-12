<?php
  include('../classes/ConnexionBD.php');
	require_once("session.php");
	require_once("../cruds/crudChat.php");
	require_once("../cruds/crudClient.php");
	$auth_client = new crudClient();
	 $Chat= new crudChat();
	
	$client_id = $_SESSION['user_session'];
	
	$stmt = "SELECT * FROM client WHERE IDclient=:client_id";
   $req = $auth_client->getBd()->prepare($stmt);
	$req->execute(array(":client_id"=>$client_id));
   $auth_client->Client_connecte($client_id);
	$userRow=$req->fetch(PDO::FETCH_ASSOC);

  $nombre_en_ligne= $Chat->numberUser_connecte();

?>
<script src="//www.kirupa.com/js/prefixfree.min.js">
</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="../assets/js/jquery-1.11.3-jquery.min.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css" type="text/css"  />

<title>welcome - <?php print($userRow['username']); ?></title>
</head>


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>





<body >


<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="">SEBCOM</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown-toggle"><a href="../home_shoppe-pack/index"><span class="glyphicon glyphicon-circle-arrow-left"></span> Retour au site</a></li>
            <li class="dropdown-toggle"><a href="home.php"><span class="glyphicon glyphicon-home"></span> home</a> &nbsp; </li>
            <li class="dropdown-toggle"> <a href="profile.php"><span class="glyphicon glyphicon-user"></span> profile</a>&nbsp;</li>
           
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php  echo $userRow['username']?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Consulter Profile</a></li>
                <li><a href="ModifierProfile.php"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Modifier Profile</a></li>
                <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Se Déconnecter</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <div class="clearfix"></div>
    	
    
<div class="container-fluid" style="margin-top:80px;"> 
    <label class="h5">Bienvenu : <?php print($userRow['username']); ?> dans l'espace utilisateur dédié à notre communauté !!</label>

</div>     

     

  
<div class="container" style="position: absolute; bottom:0px">
    <div class="row" >

        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading" id="accordion">
                    <span class="glyphicon glyphicon-comment "></span> Chat
                    
                    <div class="btn-group pull-right">

                        <a  href="home.php" type="button" class="btn btn-default btn-xs" title="Rafraichir la discussion"><i class="  glyphicon glyphicon-refresh"></i>
                        </a>

                        <a type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" >
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </a>
                         

                        
                          
                        
                    </div>
                </div>
            <div class="panel-collapse collapse" id="collapseOne">
                <div class="panel-bod" id="reload"  >
                    
                   
                </div>

                <div class="panel-footer">
                <form action="savechat.php"  method="post" id="reg-form" name="chatform">
                    <div class="input-group">
                        <input id="btn-input" type="text" type="text" name="message" id="message" class="form-control input-sm" placeholder="Type your message here..." required />
                        <span class="input-group-btn">
                           <input class="btn btn-warning btn-sm" id="btn-chat" type="submit" value="Envoyer"  />
                        </span>
                        
                    </div>       
                </form>
                   
                        <a 
                         class="btn btn-info btn-xs" title="Nombre de personne connecté"><b>Nombre d'utilisateur connectés:&nbsp;<?php print($nombre_en_ligne); ?></b>
                         </a>
                </div>
            </div>
          </div>
        </div>
    </div>

            
</div>


<!--Page Facebook-->
<div class="container " style="margin-left:1000px; bottom:0px;width: 350px;
  padding: 10px;
  text-align: center;
  border: 3px dashed #3B5998;">
  
  <div class="fb-page " data-href="https://www.facebook.com/electrobennour/?fref=ts" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
    <div class="fb-xfbml-parse-ignore">
      <blockquote cite="https://www.facebook.com/electrobennour/?fref=ts">
      <a href="https://www.facebook.com/electrobennour/?fref=ts">SEBCOM</a>
      </blockquote>
    </div>
  </div>
 
</div>

     









<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>

$(document).ready(function(){
setInterval(function(){
$("#reload").load('loadchat.php')
}, 500);
});
</script>

<script type="text/javascript">
$(document).ready(function()
{ 
  
  
  $(document).on('submit', '#reg-form', function()
  {
    
    
    
    var data = $(this).serialize();
    // a text string in standard URL-encoded notation
    
    $.ajax({
    
    type : 'POST',
    url  : 'savechat.php',
    data : data,
    success :  function(data)
           {          
          $("#reg-form")[0].reset();      
          }
    });
    return false;
   });
   });


</script>


</body>

</html>

