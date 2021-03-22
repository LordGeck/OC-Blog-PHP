<?php
declare(strict_types=1);

function home(string $message = null, string $type = null): void
{
    require 'view/homeView.php';
}

function sendMail(string $name, string $email, string $message): void
{
    $subject = 'Formulaire de contact : ' . $_POST['name'];
    $message = wordwrap($_POST['message'], 70);
    $headers = array(
        'From' => 'contact@blogphp.com',
        'Reply-To' => $_POST['email'],
        'X-Mailer' => 'PHP/' . phpversion()
    );
    mail('lordgeck@gmail.com', $subject, str_replace("\n.", "\n..", $message), $headers);
    home('E-mail envoyé.', 'success');
}
