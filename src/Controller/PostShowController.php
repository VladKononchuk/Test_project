<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\Post\PostRepositoryInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class PostShowController extends AbstractController
{
    public function __construct(
        private readonly PostRepositoryInterface $postRepository,
    ) {
    }
    #[Route('/', name: 'home_page')]
    public function index(): Response
    {
        $posts = $this->postRepository->getAllPosts();

        return $this->render('posts.html.twig', [
            'posts' => $posts,
        ]);
    }
}