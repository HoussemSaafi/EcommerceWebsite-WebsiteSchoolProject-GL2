
<?php
require_once ('../../Administrator/Services/crudReclamation.php');
//include ("PHPMailer/PHPMailerAutoload.php");
require_once('../../Administrator/classes/ConnexionBD.php');

$crr=new crudReclamation(); 

echo $_POST['Description'];
$conn=ConnexionBD::getInstance();

if (isset($_POST['Description']) and isset($_POST['Sujet']) and isset($_POST['IDClient']) )
{
$rep=new Reclamation($_POST['Description'],$_POST['Sujet'],$_POST['IDClient']);

$crr->insertReclamation($rep,$conn);


$mail = new PHPMailer();

$mail->isSMTP();    
$mail->SMTPDebug = 1;                                  // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'gaddour1992@gmail.com';                 // SMTP username
$mail->Password = 'Zahrouni+1+0+0';     
echo $mail->Password;                    // Enable TLS encryption, `ssl` also accepted
$mail->Debugoutput = 'html';
$mail->Port = 587;

$mail->setFrom('gaddour1992@gmail.com', 'bhim');
$mail->addAddress('oussama.hajji.ing@gmail.com', 'Oussama Hajji');

$mail->Subject = 'Réclamation';
$mail->Body    = $_POST['Description'];

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';

}

header('location:contact.php?success=1');
}
else{
	header('location:contact.php?success=0');
}



?>