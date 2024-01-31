<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\PostFormType;
use App\Service\CreatePostService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
final class CreatePostController extends AbstractController
{
    public function __construct(
        private readonly CreatePostService $createPostService,
    ) {
    }

    #[Route('/post/create', name: 'post_create' )]
    public function createPost(Request $request): Response
    {
        $form = $this->createForm(PostFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $name = $form->get('name')->getData();
            $description = $form->get('description')->getData();

            $this->createPostService->createPost($name, $description);

            return $this->redirectToRoute('home_page');
        }

        return $this->render('post_form.html.twig', [
            'form' => $form,
            ]);
    }
}