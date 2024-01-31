<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostFormType;
use App\Repository\PostRepositoryInterface;
use App\ValueObject\Description;
use App\ValueObject\Name;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class CreatePostController extends AbstractController
{
    public function __construct(
        private readonly PostRepositoryInterface $postRepository,
    ) {
    }

    #[Route('/posts/create', name: 'post_create', methods: ['GET', 'POST'])]
    public function createPost(Request $request): Response
    {
        $form = $this->createForm(PostFormType::class, new Post());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->postRepository->save($form->getData());

            return $this->redirectToRoute('posts');
        }

        return $this->render('post_create_form.html.twig', [
            'form' => $form,
        ]);
    }
}
