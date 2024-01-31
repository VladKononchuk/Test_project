<?php

namespace App\Repository\Post;

use App\Entity\Post;

interface PostRepositoryInterface
{
    public function save(Post $post): void;
    public function getPost(int $id): Post;
    public function remove(Post $post): void;
    public function getAllPosts(): array;
}