<?php

namespace App\DTO\User;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Type;

readonly class UserDTO{

    public function __construct(
        #[Assert\Length(
            min: 3,
            max: 50,
            minMessage: 'Your first name must be at least {{ limit }} characters long',
            maxMessage: 'Your first name cannot be longer than {{ limit }} characters',
        )]
        #[Type('string')]
        public string $username,
        #[Type('string')]
        public string $password,
    )
    {

    }
}