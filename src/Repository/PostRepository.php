<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityNotFoundException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Post>
 */
final class PostRepository extends ServiceEntityRepository implements PostRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }

    public function getPost(int $id): Post
    {
        $post = $this->find($id);

        if (!$post instanceof Post) {
            throw new EntityNotFoundException(sprintf('No post found for id %d', $id));
        }

        return $post;
    }

    public function save(Post $post): void
    {
        $this->_em->persist($post);
        $this->_em->flush();
    }

    public function remove(Post $post): void
    {
        $this->_em->remove($post);
        $this->_em->flush();
    }
}
