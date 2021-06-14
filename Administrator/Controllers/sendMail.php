<?php

include ("../Services/CrudProduit.php");


require '../phpmailer/PHPMailerAutoload.php';
$ID = $_GET['ID'];
var_dump($ID);
$cc=new CrudProduit();
$produit = $cc->getProduit($ID);
var_dump($produit);

if($produit)
{
    $mail = new PHPMailer;

    $mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'shopgl2houss@gmail.com';                 // SMTP username
    $mail->Password = 'shop-gl2-2020-2021';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->setFrom('shopgl2houss@gmail.com');

    $req2="SELECT email FROM newsletter";
    $result=$cc->conn->query($req2);
    $result=$result->fetchAll();
    foreach ($result as $res)
    {
        $mail->addAddress($res['email']);
    }

    $mail->Subject = 'A NEW PRODUCT IS JUST IN: '.$produit['Designation'];
    var_dump($produit);
    //$mail->Body    = 'nom produit :'.$produit->getDesignation().' Prix : '.$produit->getPrixHT();
    $mail->Body    = 'Hello our dear Subscriber Discover our new product: Product Name :'.$produit['Designation'].' Product Price : '.$produit['PrixHT'].' TND';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        // echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
        //header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

else
{
    var_dump($produit);
    var_dump("error");
    print_r($cc->conn->errorInfo());
}
?>