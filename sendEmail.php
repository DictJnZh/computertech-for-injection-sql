<?php
use PHPMailer\PHPMailer\PHPMailer;

$email = "nicoverron@hotmail.com";
$subject = "Merci de vous être inscrit a UberStreet";
$body = "Merci aux clients fidèles";

require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";

$mail = new PHPMailer();

//smtp settings
$mail->isSMTP();
$mail->SMTPDebug = 4;
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->Username = 'uberstreet.officiel@gmail.com';
$mail->Password = 'Arouf944';
$mail->Port = 587;
$mail->SMTPSercure = "tls";

//email settings
$mail->isHTML(true);
$mail->CharSet = 'UTF-8';
$mail->From = 'uberstreet.officiel@gmail.com';
$mail->FromName = 'UberStreet';
$mail->addAddress($email);
$mail->Subject = $subject;
$mail->Body = $body;

if ($mail->send())
{
    $status = "success";
    $response = "Email is Sent !";
    echo 'Message bien envoyé';
}
else
{
    $status = "failed";
    $response = "Something is wrong: <br>" . $mail->ErrorInfo;
}

exit(json_encode(array("statut" => $status, "response" => $response)));

?>