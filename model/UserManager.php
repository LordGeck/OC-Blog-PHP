<?php
declare(strict_types=1);
require_once("model/Manager.php");

class UserManager extends Manager
{
    public function getUser(int $username)
    {
        $request = $this->database->prepare('SELECT username, email, first_name, last_name, password_hash, role FROM users WHERE username = ?');
        $request->execute([$username]);

        return $request;
    }
}