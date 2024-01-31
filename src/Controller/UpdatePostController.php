<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\UpdatePostService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Form\PostFormType;

final class UpdatePostController extends AbstractController
{
    public function __construct(
        private readonly UpdatePostService $updatePostService,
    ) {
    }

    #[Route('/post/update{id}', name: 'post_update' )]
    public function createPost(int $id, Request $request): Response
    {
        $form = $this->createForm(PostFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $name = $form->get('name')->getData();
            $description = $form->get('description')->getData();

            $this->updatePostService->updatePost($id, $description);

            return $this->redirectToRoute('home_page');
        }

        return $this->render('post_form.html.twig', [
            'form' => $form,
        ]);
    }



}