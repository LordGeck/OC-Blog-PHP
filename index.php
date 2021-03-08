<?php
declare(strict_types=1);
require 'controller/homeController.php';
require 'controller/blogPostController.php';
require 'controller/signupController.php';
require 'controller/loginController.php';
require 'controller/addBlogPostController.php';
require 'controller/adminController.php';
require 'controller/commentController.php';
require 'controller/errorController.php';

session_start();

try {
    if (isset($_GET['page'])) {
        if ($_GET['page'] === 'postList') {
            blogPostList();
        }
        elseif ($_GET['page'] === 'post') {
            if (isset($_GET['id'])) {
                blogPost();
            }
            else {
                throw new Exception('Id d\'article absent.');
            }
        }
        elseif ($_GET['page'] === 'signup') {
            signupPage();
        }
        elseif ($_GET['page'] === 'login') {
            loginPage();
        }
        // Admin section
        elseif ($_SESSION['role'] === 'ADMIN') {
            if ($_GET['page'] === 'admin') {
                adminPage();
            }
            elseif ($_GET['page'] === 'addPost') {
                addBlogPostPage();
            }
        }
        else {
            throw new Exception('Cette page n\'existe pas.');
        }
    }
    elseif (isset($_GET['action'])) {
        if ($_GET['action'] === 'signup') {
            if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['password']) && !empty($_POST['password_conf'])) {
                signup($_POST['username'], $_POST['email'], $_POST['firstname'], $_POST['lastname'], $_POST['password'], $_POST['password_conf']);
            }
            else {
                signupPage('Certains champs sont vides.', 'danger');
            }
        }
        elseif ($_GET['action'] === 'login') {
            if (!empty($_POST['username']) && !empty($_POST['password'])) {
                login($_POST['username'], $_POST['password']);
            }
            else {
                throw new Exception('Certains champs sont vides.');
            }
        }
        elseif ($_GET['action'] === 'logout') {
            logout();
        }
        elseif ($_GET['action'] === 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['content']) && isset($_SESSION['username'])) {
                    addComment($_POST['content'], $_GET['id'], $_SESSION['username']);
                }
                else {
                    blogPost('Certains champs sont vides.', 'danger');
                }
            }
            else {
                throw new Exception('Aucun article spécifié.');
            }
        }
        // Admin section
        elseif ($_SESSION['role'] === 'ADMIN') {
            if ($_GET['action'] === 'addPost') {
                if (!empty($_POST['title']) && !empty($_POST['header_content']) && !empty($_POST['main_content']) && isset($_SESSION['username'])) {
                    addBlogPost($_POST['title'], $_POST['header_content'], $_POST['main_content'], $_SESSION['username']);
                }
                else {
                    throw new Exception('Certains champs sont vides.');
                }
            }
        }
        
    }
    else {
        home();
    }
}
catch(Exception $e) {
    error($e);
}
