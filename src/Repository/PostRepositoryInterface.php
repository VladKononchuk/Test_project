<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Post;

interface PostRepositoryInterface
{
    public function getPost(int $id): Post;

    public function save(Post $post): void;

    public function remove(Post $post): void;
}