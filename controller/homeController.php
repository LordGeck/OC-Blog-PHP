<?php
declare(strict_types=1);
use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';

function home(string $message = null, string $type = null): void
{
    require 'view/homeView.php';
}

function sendMail(string $name, string $email, string $message): void
{
    $mail = new PHPMailer;
    $mail->setFrom('admin@blogphp.com');
    $mail->addAddress('adress@gmail.com');
    $mail->addReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = 'Formulaire de contact : message de ' . $_POST['name'];
    $mail->Body = $_POST['message'];
    $mail->IsSMTP();
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'ssl://smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Port = 465;

    //Set your existing gmail address as user name
    $mail->Username = 'adress@gmail.com';

    //Set the password of your gmail address here
    $mail->Password = 'PASSWORD';
    if(!$mail->send()) {
        home('Erreur d\'envoi.', 'danger');
    } else {
        home('E-mail envoyé.', 'success');
    }
    
}
