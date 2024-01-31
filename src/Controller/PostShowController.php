<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\PostRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class PostShowController extends AbstractController
{
    public function __construct(
        private readonly PostRepositoryInterface $postRepository,
    ) {
    }

    #[Route('/', name: 'posts', methods: ['GET'])]
    public function index(): Response
    {
        $posts = $this->postRepository->findAll();

        return $this->render('posts.html.twig', [
            'posts' => $posts,
        ]);
    }
}