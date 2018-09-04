<?php

spl_autoload_register();

class UserTransferObject 
{
    private $id;
    private $username;
    private $password;

    // public function __construct($id, $username, $password)
    // {
    //     $this->setId($id);
    //     $this->setUsername($username);
    //     $this->setPassword($password);
    // }

    public function getId()
    {
        return $this->id;
    }

    private function setId($id)
    {
        $this->id = $id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    private function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    private function setPassword($password)
    {
        $this->password = $password;
    }

}

$pdo = new PDO("mysql:host=localhost:3306;dbname=profile", "root", "");


$db = new \Database\PDODatabase($pdo);


$allUsers = $db->query("SELECT * FROM users")
    ->execute()
    ->fetch(UserTransferObject::class);

foreach ($allUsers as $user) {
    echo $user->getId() . "|" . $user->getUsername() . "</br>";
}