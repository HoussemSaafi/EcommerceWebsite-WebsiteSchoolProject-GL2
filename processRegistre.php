<?php

session_start();
include_once 'autoload.php';

$email = $_POST['email'];
$password = $_POST['pwd'];

if (isset($email) && isset($password)) {
    $adminRepository = new AdminRepository();
    $admins = $adminRepository->findAll();
    $userFound=false;
    foreach ($admins as $admin) {
        if ($email == $admin->email) {

            $_SESSION['errorMessage'] = "these credentials already exist, enter new credentials !";
            header('location:pages-register.php');
            $userFound=true;
            return;
        }
    }
    if ($userFound==false){

        $admin = new Admin($email,$password);
        $adminRepository->add($admin);
        $_SESSION['admin'] = "$admin->getEmail()";
        header('location:Views/Home.php');
    }



} else {
    $_SESSION['errorMessage'] = "you have to enter your Credentials! ";
    header('location:index.php');
}
