<?php
declare(strict_types=1);
require_once 'model/Manager.php';

class UserManager extends Manager
{
    public function getUser(string $username): array|false
    {
        $request = $this->database->prepare('SELECT username, email, firstname, lastname, password_hash, role
            FROM users
            WHERE username = ?');
        $request->execute([$username]);

        return $request->fetch();
    }

    public function checkUser(string $username, string $email): array|false
    {
        $request = $this->database->prepare('SELECT username, email
            FROM users
            WHERE username = ? OR email = ?');
        $request->execute([$username, $email]);

        return $request->fetch();
    }

    public function addUser(
        string $username,
        string $email,
        string $firstname,
        string $lastname,
        string $passwordHash
    ): bool {
        $request = $this->database->prepare('INSERT INTO users
            (username, email, firstname, lastname, password_hash)
            VALUES(?, ?, ?, ?, ?)');

        return $request->execute([$username, $email, $firstname, $lastname, $passwordHash]);
    }
}
