<?php

declare(strict_types=1);

namespace App\Service;

use App\Repository\Post\PostRepositoryInterface;
use App\ValueObject\Description;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class UpdatePostService extends AbstractController
{
    public function __construct(
        private readonly PostRepositoryInterface $postRepository,
    ) {
    }

    public function updatePost(int $id, string $description): void
    {
        $post = $this->postRepository->getPost($id);
        $post->setDescription(new Description($description));
        $this->postRepository->save($post);
    }
}