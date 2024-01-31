<?php

namespace App\Service;

use App\Entity\Post;
use App\Repository\Post\PostRepositoryInterface;

final readonly class DeletePostService
{
    public function __construct(
        private PostRepositoryInterface $postRepository,
    ) {
    }

    public function deletePost(int $id): void
    {
        $post = $this->postRepository->getPost($id);
        $this->postRepository->remove($post);
    }
}