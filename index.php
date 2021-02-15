<?php
declare(strict_types=1);
require('controller/homeController.php');
require('controller/blogPostController.php');
require('controller/signupController.php');
require('controller/loginController.php');
require('controller/addBlogPostContoller.php');

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
        elseif ($_GET['page'] === 'addPost') {
            addBlogPostPage();
        }
        else {
            throw new Exception('Cette page n\'existe pas.');
        }       
    }
    elseif (isset($_GET['action'])) {
        if ($_GET['action'] === 'signup') {
            if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['password']) && !empty($_POST['password_conf'])) {
                if ($_POST['password'] !== $_POST['password_conf']) {
                    throw new Exception('Les mots de passe ne correspondent pas.');
                }
                else {
                    signup($_POST['username'], $_POST['email'], $_POST['firstname'], $_POST['lastname'], $_POST['password']);
                }
            }
            else {
                throw new Exception('Certains champs sont vides.');
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
        elseif ($_GET['action'] === 'addPost') {
            if (!empty($_POST['title']) && !empty($_POST['header_content']) && !empty($_POST['main_content']) && isset($_SESSION['username'])) {
                addBlogPost($_POST['title'], $_POST['header_content'], $_POST['main_content'], $_SESSION['username']);
            }
            else {
                throw new Exception('Certains champs sont vides.');
            }
        }
    }
    else {
        home();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
