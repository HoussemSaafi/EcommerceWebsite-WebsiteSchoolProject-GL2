<?php
require_once('../classes/ConnexionBD.php');
include('../classes/Admin.php');
include('../Views/RechercheClient.php');

/*$auth_admin = new Admin();
$admin_id = $_SESSION['admin_session']; */
//$conn= new CrudClient();
isset($_POST['id'])?$id= $_POST['id']:$id=0;
$conn= ConnexionBD::getInstance();
if(isset($_POST['activer'])){
 $conn->desactivercompte($id) ;
    header('RechercheClient.php');

}
if(isset($_POST['desactiver'])){
    $req1='UPDATE Client SET  etatCompte = 1 WHERE id = :id';
   $stmt =$conn->query($req1);
    $stmt->execute();

    header('RechercheClient.php');


}


/*if($auth_admin->activercompte($user_id))
{
    $auth_admin->redirect('RechercheClient.php');

}
*/

