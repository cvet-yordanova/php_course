<?php

namespace App\Data;

class UserDTO
{
    private $id;
    private $username;
    private $password;
    private $firstName;
    private $lastName;
    private $bornOn;

    public static function ($username, $password, $firstName, $lastName, $bornOn, $id = null)
    {
        $this->setId($id);
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setFirstName($firstName);
        $this->setLastName( $lastName);
        $this->setBornOn($bornOn);
    }


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

    public function getFirstName()
    {
        return $this->firstName;
    }

    private function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    private function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    
    public function getBornOn()
    {
        return $this->bornOn;
    }

    private function setBornOn($bornOn)
    {
        $this->bornOn = $bornOn;
    }


}