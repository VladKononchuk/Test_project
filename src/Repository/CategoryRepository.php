<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityNotFoundException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Category>
 */
final class CategoryRepository extends ServiceEntityRepository implements CategoryRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Category::class);
    }

    public function getCategory(int $id): Category
    {
        $post = $this->find($id);

        if (!$post instanceof Category) {
            throw new EntityNotFoundException(sprintf('No category found for id %d', $id));
        }

        return $post;
    }

    public function save(Category $category): void
    {
        $this->_em->persist($category);
        $this->_em->flush();
    }

    public function remove(Category $category): void
    {
        $this->_em->remove($category);
        $this->_em->flush();
    }
}
