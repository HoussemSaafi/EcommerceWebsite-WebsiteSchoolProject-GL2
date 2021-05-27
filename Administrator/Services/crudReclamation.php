<?php
include("../classes/Reclamation.php");
include("../classes/Repository.php");

class crudReclamation extends Repository {

    function __construct()
    {
        parent::__construct('reclamation');
    }
    function insertReclamation($rep){

        $req1="INSERT INTO reclamation (IDReclamation,Description,Sujet,DateReclamation,IDClient)
		VALUES (".$rep->getIDReclamation().",'".$rep->getDescription()."','".$rep->getSujet()."','".$rep->getDateReclamation()."','".$rep->getIDclient()."')";
        $this->bd->query($req1);

    }
    function afficheReclamation(){
        $req="SELECT * FROM reclamation";
        $liste=$this->bd->query($req);
        return $liste->fetchAll();

    }
    function recupererReclamation($IDReclamation){

        $req="SELECT  * FROM reclamation WHERE IDReclamation=".$IDReclamation;
        $rep=$this->bd->query($req);
        return $rep->fetchAll();
    }


    function modifierReclamation($rep){
        $req1="UPDATE reclamation SET IDReclamation='".$rep->getIDReclamation()."',Description='".$rep->getDescription()."',Sujet='".$rep->getSujet()."',IDClient='".$rep->getIDClient()."' WHERE IDReclamation=".$rep->getIDReclamation();

        $this->bd->exec($req1);   }



    function supprimerReclamation($IDReclamation){
        $req1="DELETE FROM reclamation where IDReclamation=".$IDReclamation;
        $this->bd->exec($req1);
    }

    function rechercheReclamation ($Description){
        $req="SELECT * FROM reclamation where reclamation.Description LIKE '%".$Description . "%'" ;
        $liste=$this->bd->query($req);
        return ($liste->fetchAll());
    }

}

?>