<?php

class Manager
{
    protected function databaseConnect()
    {
        $database = new PDO('mysql:host=localhost;dbname=php_blog;charset=utf8', 'root', 'fa4t65yi');
        return $database;
    }
}