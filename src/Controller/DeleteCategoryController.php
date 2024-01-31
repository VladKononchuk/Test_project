<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class DeleteCategoryController extends AbstractController
{
    public function __construct(
        private readonly CategoryRepositoryInterface $categoryRepository,
    ) {
    }

    #[Route('/categories/delete/{id}', name: 'category_delete', methods: ['GET'])]
    public function deleteCategory(Category $category): Response
    {
        $this->categoryRepository->remove($category);

        return $this->redirectToRoute('categories');
    }
}
