<?php
require_once('../classes/ConnexionBD.php');

include("../classes/ReponseReclamation.php");

class crudReponseReclamation{

    function __construct()
    {
        $this->bd = ConnexionBD::getInstance();

    }

    function insertReponseReclamation($rep){

        $req1="INSERT INTO reponsereclamation (IDReclamation,reponse) 
		VALUES ('".$rep->getIDReclamation()."','".$rep->getReponse()."')";
        $this->bd->query($req1);
    }
    function afficheReponseReclamation(){
        $req="SELECT * FROM reponsereclamation";
        $liste=$this->bd->query($req);
        return $liste->fetchAll();

    }
    function recupererReponseReclamation($IDRepReclamation){

        $req="SELECT IDReclamation,IDRepReclamation,reponse,Date FROM reponsereclamation WHERE IDRepReclamation=".$IDRepReclamation;
        $rep=   $this->bd->query($req);
        return $rep->fetchAll();
    }
    function modifierReponseReclamation($rep){
        $req1="UPDATE reponsereclamation SET IDRepReclamation='".$rep->getIDRepReclamation()."',reponse='".$rep->getReponse()."' WHERE IDRepReclamation=".$rep->getIDRepReclamation();
        $this->bd->exec($req1);
    }
    function supprimerReponseReclamation($IDRepReclamation){
        $req1="DELETE FROM reponsereclamation where IDRepReclamation=".$IDRepReclamation;
       $this->bd->exec($req1);
    }
}

?>