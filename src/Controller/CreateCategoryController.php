<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryFormType;
use App\Repository\CategoryRepositoryInterface;
use App\ValueObject\Name;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class CreateCategoryController extends AbstractController
{
    public function __construct(
        private readonly CategoryRepositoryInterface $categoryRepository,
    ) {
    }

    #[Route('/categories/create', name: 'category_create', methods: ['GET', 'POST'])]
    public function createCategory(Request $request): Response
    {
        $form = $this->createForm(CategoryFormType::class, new Category());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->categoryRepository->save($form->getData());

            return $this->redirectToRoute('categories');
        }

        return $this->render('category_create_form.html.twig', [
            'form' => $form,
        ]);
    }
}
