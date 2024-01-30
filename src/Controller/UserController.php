<?php
// src/Controller/UserController.php
namespace App\Controller;

use App\Services\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user', name: 'user_')]
class UserController extends AbstractController
{
    public function __construct(
        private readonly UserService $service
    )
    {}

    #[Route('', name: 'create_', methods: ['POST'])]
    public function store(Request $request): Response
    {
        $this->service->store($request);
        return new Response('',201);
    }
    #[Route('', name: 'show_', methods: ['get'])]
    public function show(Request $request): JsonResponse
    {

        return $this->json([
            "users" => $this->service->get()
        ]);
    }
}
