<?php
declare(strict_types=1);
require('controller/homeController.php');

try {
    if (isset($_GET['page'])) {

        //insert page here

        throw new Exception('Cette page n\'existe pas.');
    }
    else {
        home();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
