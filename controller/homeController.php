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
    $contactMail = parse_ini_file('config/config.ini', true);
    $contactMail = $contactMail['contact_mail'];

    $mail = new PHPMailer;
    $mail->setFrom('admin@blogphp.com');
    $mail->addAddress($contactMail['email']);
    $mail->addReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = 'Formulaire de contact : message de ' . $_POST['name'];
    $mail->Body = $_POST['message'];
    $mail->IsSMTP();
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'ssl://smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Port = 465;
    $mail->Username = $contactMail['username'];
    $mail->Password = $contactMail['password'];

    if (!$mail->send()) {
        home('Erreur d\'envoi.', 'danger');
    } else {
        home('E-mail envoyé.', 'success');
    }
}
