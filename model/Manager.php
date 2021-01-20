<?php
declare(strict_types=1);

class Manager
{
    protected $database;

    function __construct()
    {
        $this->database = new PDO('mysql:host=localhost;dbname=php_blog;charset=utf8', 'root', 'fa4t65yi');
    }
}