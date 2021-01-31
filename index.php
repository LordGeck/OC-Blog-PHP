<?php
declare(strict_types=1);
require('controller/homeController.php');
require('controller/blogPostController.php');

try {
    if (isset($_GET['page'])) {
        if ($_GET['page'] === 'postList') {
            blogPostList();
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
