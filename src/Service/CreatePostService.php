<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Post;
use App\Repository\Post\PostRepositoryInterface;
use App\ValueObject\Description;
use App\ValueObject\Name;

final readonly class CreatePostService
{
    public function __construct(
        private PostRepositoryInterface $postRepository,
    ) {
    }

    public function createPost(string $name, string $description): void
    {
        $post = new Post();
        $post->setName(new Name($name));
        $post->setDescription(new Description($description));
        $this->postRepository->save($post);
    }
}