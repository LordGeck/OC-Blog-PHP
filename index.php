<?php
declare(strict_types=1);
require('controller/homeController.php');
require('controller/blogPostController.php');

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
        else {
            throw new Exception('Cette page n\'existe pas.');
        }        
    }
    else {
        home();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
