<?php

session_start();
include_once 'autoload.php';
/*
 * 1- Récupérer les identifiants
 * Tester si le login et le mot de passe correspondent
 * Si oui
 *  Redirige vers la page d'accueil
 * Si non
 *  Redirgie vers la page login avec un message d'erreur
 * */

//1
$email = $_POST['email'];
$password = $_POST['pwd'];

if (isset($email) && isset($password)) {
    $adminRepository = new AdminRepository();
    $admins = $adminRepository->findAll();
    $adminFound=false;
    foreach ($admins as $admin) {
        if ($email == $admin->email && $password == $admin->password) {
            $_SESSION['admin'] = "$admin->email";
            header('location:Views/Home.php');
            $adminFound=true;
            return;
        }
    }
        if ($adminFound==false){
            $_SESSION['errorMessage'] = "Veuillez vérifier vos credenitals";
            header('location:index.php');
        }



} else {
    $_SESSION['errorMessage'] = "Veuillez vérifier vos credenitals";
    header('location:index.php');
}
