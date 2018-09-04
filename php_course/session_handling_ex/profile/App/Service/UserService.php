<?php

namespace App\Service;

use App\Data\UserDTO;
use App\Repository\UserRepositoryInterface;
use Database\DatabaseInterface;

class UserService implements UserServiceInterface
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    
    public function register(UserDTO $userDTO, $confirmPassword): bool
    {
        if($userDTO->getPassword() != $confirmPassword)
        {
            return false;
        }

        if(null !== $this->userRepository-> findOneByUsername($userDTO->getUsername()))
        {
            return false;
        }

        $plainPassword = $userDTO->getPassword();
        $passwordHash = password_hash($plainPassword, PASSWORD_BCRYPT);
        $userDTO->setPassword($passwordHash);

        return $this->userRepository->insert($userDTO);
    }
}