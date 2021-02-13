<?php
declare(strict_types=1);
require_once('model/UserManager.php');

function signupPage() : void
{
    require("view/signupView.php");
}

function signup(string $username, string $email, string $firstname, string $lastname, string $password) : void
{
    $userManager = new UserManager();
    $user = $userManager->getUser($username);
    if ($user['username'] || $user['email']) {
        throw new Exception('Le nom d\'utilisateur ou l\'email sont déjà utilisé.');
    }
    else {
        $userManager = new UserManager();
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $userManager->addUser($username, $email, $firstname, $lastname, $password_hash);
        header('Location: index.php');
    }
}