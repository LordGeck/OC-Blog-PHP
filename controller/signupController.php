<?php
declare(strict_types=1);
require_once 'model/UserManager.php';

function signupPage(string $message = null, string $type = null): void
{
    require 'view/signupView.php';
}

function signup(string $username, string $email, string $firstname, string $lastname, string $password, string $passwordConf): void
{
    $userManager = new UserManager();
    $user = $userManager->checkUser($username, $email);
    if ($user) {
        signupPage('Le nom d\'utilisateur ou l\'email sont déjà utilisé.', 'danger');
    }
    elseif ($password !== $passwordConf) {
        signupPage('Les mots de passe ne correspondent pas.', 'danger');
    }
    else {
        $userManager = new UserManager();
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $userManager->addUser($username, $email, $firstname, $lastname, $passwordHash);
        signupPage('Utilisateur créé avec succès.', 'success');
    }
}
