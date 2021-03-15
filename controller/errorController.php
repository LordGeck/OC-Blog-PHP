<?php
declare(strict_types=1);

function error(object $e): void
{
    $error = $e->getMessage();
    require 'view/errorView.php';
}
