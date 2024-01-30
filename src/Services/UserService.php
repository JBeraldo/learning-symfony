<?php

namespace App\Services;

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



    public function store(Request $request)
    {
        $data = $request->toArray();
        $user = new User();

        $hashedPassword =  $this->passwordHasher->hashPassword($user,$data['password']);

        $user->setUsername($data['username']);
        $user->setPassword($hashedPassword);

        $this->userRepository->store($user);
    }


    public function get()
    {
        return $this->userRepository->findAll();
    }
}