<?php
declare(strict_types=1);
require_once('model/UserManager.php');

function signupPage()
{
    require("view/signupView.php");
}

function signup(string $username, $email, $first_name, $last_name, $password)
{
    $userManager = new UserManager();
    $user = $userManager->getUser($username);
    if ($user['username'] or $user['email']) {
        throw new Exception('Le nom d\'utilisateur ou l\'email sont déjà utilisé.');
    }
    else {
        $userManager = new UserManager();
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $userManager->addUser($username, $email, $first_name, $last_name, $password_hash);
        header('Location: index.php');
    }
}