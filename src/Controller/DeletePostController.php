<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\DeletePostService;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

final class DeletePostController extends AbstractController
{
    public function __construct(
        private readonly DeletePostService $deletePostService,
    ) {
    }

    #[Route('/post/delete{id}', name: 'post_delete' )]
    public function createPost(int $id): Response
    {
        $this->deletePostService->deletePost(--$id);

        return $this->redirectToRoute('home_page');
    }
}