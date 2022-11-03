<?php

class User
{
    public $username;
    public $password;
    public $name;
    public $surname;
    public $email;
    public $phone;

    public function __construct($username, $password, $name, $surname, $email, $phone)
    {
        $this->username = $username;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->phone = $phone;
    }

    public static function logInUser($userL, $passL, mysqli $conn)
    {
        $query = "SELECT * FROM user WHERE username='$userL' and password='$passL'";
        return $conn->query($query);
    }

    public static function registerUser($userR, $passR, $nameR, $surnameR, $emailR, $phoneR, mysqli $conn)
    {
        $query = "INSERT INTO user(`username`, `name`, `surname`, `email`, `phone`, `password`) 
        VALUES('$userR', '$nameR', '$surnameR', '$emailR', '$phoneR', '$passR')";
        return $conn->query($query);
    }
}
