<?php
class Member
{
    private $id;
    private $username;
    private $email;
    private $passwordHash;
    private $date;

    public function __construct($id, $username, $email, $passwordHash, $date)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->passwordHash = $passwordHash;
        $this->date = $date;
    }

    // Methode zum Überprüfen des Passworts
    public function verifyPassword($password)
    {
        return password_verify($password, $this->passwordHash);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPasswordHash()
    {
        return $this->passwordHash;
    }

    public function getDate()
    {
        return $this->date;
    }
    public static function getInstance()
    {
        return MemberListPDOSQLite::getInstance(); // Datenbank-Implementierung
    }
}