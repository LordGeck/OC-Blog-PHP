<?php
require_once("model/Manager.php");

class UserManager extends Manager
{
    public function getUser($username)
    {
        $database = $this->databaseConnect();
        $request = $database->prepare('SELECT username, email, first_name, last_name, password_hash, role FROM users WHERE username = ?');
        $request->execute(array($username));
        return $request;
    }
}