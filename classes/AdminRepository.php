<?php
include_once 'autoload.php';

class AdminRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('Admin');
    }
    public function add($admin) {

        $remail=$admin->getEmail();
        $rpwd=$admin->getPwd();
        $request = "INSERT INTO  Admin (email,password) VALUES ".
           "('$remail', '$rpwd');";
        $response =$this->bd->prepare($request);
        $response->execute();
        return $response->fetch(PDO::FETCH_OBJ);
    }

}
