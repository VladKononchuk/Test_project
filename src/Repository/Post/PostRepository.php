<?php

namespace App\Repository\Post;

use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityNotFoundException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Post>
 */
final class PostRepository extends ServiceEntityRepository implements PostRepositoryInterface
{
    public function __construct(
        private readonly ManagerRegistry $registry,
    ) {
        parent::__construct($registry, Post::class);
    }

    public function save(Post $post): void
    {
        $this->_em->persist($post);
        $this->_em->flush();
    }

    public function getPost(int $id): Post
    {
        $repository = $this->registry->getRepository(Post::class);
        $post = $repository->findOneBy(['id' => $id]);

        if (!$post instanceof Post) {
            throw new EntityNotFoundException('No post found for id '. $id);
        }

        return $post;
    }

    public function remove(Post $post): void
    {
        $this->_em->remove($post);
        $this->_em->flush();
    }

    public function getAllPosts(): array
    {
        $repository = $this->registry->getRepository(Post::class);
//        $p = $repository->findAll();
//        $posts = [];
//        foreach ($p as $value) {
//            $posts[$value->getId()] = [$value];
//        }
//
//        return $posts;

        return $repository->findAll();
    }
}
