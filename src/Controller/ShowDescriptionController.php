<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\Post\PostRepositoryInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class ShowDescriptionController extends AbstractController
{
    public function __construct(
        private readonly PostRepositoryInterface $postRepository,
    ) {
    }
    #[Route('/description{id}', name: 'show_description', requirements: ['id' => '\d+'])]
    public function index(int $id): Response
    {
        $posts = $this->postRepository->getAllPosts();
        $post = $posts[$id];
        return $this->render('description.html.twig', [
            'post' => $post,
        ]);
    }
}