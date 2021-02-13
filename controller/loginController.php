<?php
declare(strict_types=1);
require_once('model/UserManager.php');

function loginPage() : void
{
    require("view/loginView.php");
}

function login(string $username, string $password) : void
{
    $userManager = new UserManager();
    $user = $userManager->getUser($username);
    if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['username'] = $user['username'];
        header('Location: index.php');
    }
    else {
        throw new Exception('Nom d\'utilisateur ou mot de passe incorrect');
    }
}

function logout() : void
{
    $_SESSION = array();
    session_destroy();
    header('Location: index.php');
}