<?php
declare(strict_types=1);
require('controller/homeController.php');
require('controller/blogPostController.php');
require('controller/signupController.php');

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
        else {
            throw new Exception('Cette page n\'existe pas.');
        }       
    }
    elseif (isset($_GET['action'])) {
        if ($_GET['action'] === 'signup') {
            if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['password_1']) && !empty($_POST['password_2'])) {
                if ($_POST['password_1'] != $_POST['password_2']) {
                    throw new Exception('Les mots de passe ne correspondent pas.');
                }
                else {
                    signup($_POST['username'], $_POST['email'], $_POST['first_name'], $_POST['last_name'], $_POST['password_1']);
                }                
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
