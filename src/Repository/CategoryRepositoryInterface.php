<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Category;

interface CategoryRepositoryInterface
{
    public function getCategory(int $id): Category;

    public function save(Category $category): void;

    public function remove(Category $category): void;
}