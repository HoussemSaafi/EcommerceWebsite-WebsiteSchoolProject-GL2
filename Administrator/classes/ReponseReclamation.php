<?php
class ReponseReclamation{
    //attributs
    protected $IDRepReclamation;
    protected $reponse;
    protected $IDReclamation;

    //constructeur
    function __construct($IDReclamation,$reponse){
    //    $this->IDRepReclamation=$IDRepReclamation;
        $this->reponse=$reponse;
$this->IDReclamation=$IDReclamation ;
    }
    function getIDRepReclamation(){
        return $this->IDRepReclamation;
    }
    function getReponse(){
        return $this->reponse;
    }

function getIDReclamation(){

    return $this->IDReclamation;


}}

?>
