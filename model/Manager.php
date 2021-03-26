<?php
declare(strict_types=1);

class Manager
{
    protected $database;

    public function __construct()
    {
        $dbLogin = parse_ini_file('config/config.ini', true);
        $dbLogin = $dbLogin['database'];

        $this->database = new PDO('mysql:host=localhost;dbname=php_blog;charset=utf8',
            $dbLogin['username'], $dbLogin['password']);
    }
}
