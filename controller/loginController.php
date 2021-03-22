<?php
declare(strict_types=1);
require_once 'model/UserManager.php';

function loginPage(string $message = null, string $type = null): void
{
    require 'view/loginView.php';
}

function login(string $username, string $password): void
{
    $userManager = new UserManager();
    $user = $userManager->getUser($username);
    if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        home();
    }
    else {
        loginPage('Nom d\'utilisateur ou mot de passe incorrect', 'danger');
    }
}

function logout(): void
{
    $_SESSION = array();
    session_destroy();
    home();
}