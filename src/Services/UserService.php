<?php

namespace App\Services;

use App\DTO\User\UserDTO;
use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserService
{
    public function __construct(
        private UserRepository $userRepository,
        private UserPasswordHasherInterface $passwordHasher,
    )
    {}



    public function store(UserDTO $userDTO)
    {
        $user = new User();

        $hashedPassword =  $this->passwordHasher->hashPassword($user,$userDTO->password);

        $user->setUsername($userDTO->username);
        $user->setPassword($hashedPassword);

        $this->userRepository->store($user);
    }


    public function get()
    {
        return $this->userRepository->findAll();
    }
}