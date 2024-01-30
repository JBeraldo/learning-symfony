<?php
// src/Controller/UserController.php
namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/user', name: 'user_')]
class UserController extends AbstractController
{
    public function __construct(
        private readonly UserRepository $userRepository
    )
    {}

    #[Route('', name: 'create_', methods: ['POST'])]
    public function store(Request $request): JsonResponse
    {
        return $this->json([
            "user" => $this->userRepository->store($request)
        ]);
    }
    #[Route('', name: 'show_', methods: ['get'])]
    public function show(Request $request): JsonResponse
    {

        return $this->json([
            "users" => $this->userRepository->get()
        ]);
    }
}
