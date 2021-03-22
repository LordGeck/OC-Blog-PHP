<?php
declare(strict_types=1);

class Manager
{
    protected $database;

    public function __construct()
    {
        $this->database = new PDO('mysql:host=localhost;dbname=php_blog;charset=utf8', 'root', 'fa4t65yi');
    }
}