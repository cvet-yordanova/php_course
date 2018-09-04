<?php

namespace App\Repository;

use App\Data\UserDTO;
use Database\DatabaseInterface;

class UserRepository implements UserRepositoryInterface
{

    private $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }


    public function insert(UserDTO $user): bool
    {
        $this->query("INSERT INTO users (username, password, first_name, last_name, born_on) 
        VALUES (?, ?, ?, ?, ?)")->execute([
            $user->getUsername(),
            $user->getPassword(),
            $user->getFirstName(),
            $user->getLastName(),
            $user->getBornOn()   
     ]);   
     
     return true;
        
    }

    public function findOneByUsername(string $username): ?UserDTO
    {
        return $this->db->query("
         SELECT id, username, first_name AS firstName, last_name AS lastName,born_on AS bornOn 
         FROM users WHERE username = ?")->execute([$username])
         ->fetch(UserDTO::class)
         ->current();
    }
}
