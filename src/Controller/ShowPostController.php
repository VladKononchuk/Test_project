<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class ShowPostController extends AbstractController
{
    #[Route('/posts/{id}', name: 'show_post', methods: ['GET'])]
    public function index(Post $post): Response
    {
        return $this->render('post.html.twig', [
            'post' => $post,
        ]);
    }
}