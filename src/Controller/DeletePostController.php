<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepositoryInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

final class DeletePostController extends AbstractController
{
    public function __construct(
        private readonly PostRepositoryInterface $postRepository,
    ) {
    }

    #[Route('/posts/delete/{id}', name: 'post_delete', methods: ['GET'])]
    public function deletePost(Post $post): Response
    {
        $this->postRepository->remove($post);

        return $this->redirectToRoute('posts');
    }
}
