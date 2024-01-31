<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepositoryInterface;
use App\ValueObject\Description;
use App\ValueObject\Name;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Form\PostFormType;

final class UpdatePostController extends AbstractController
{
    public function __construct(
        private readonly PostRepositoryInterface $postRepository,
    ) {
    }

    #[Route('/posts/update/{id}', name: 'post_update', methods: ['GET', 'POST'])]
    public function updatePost(Post $post, Request $request): Response
    {
        $form = $this->createForm(PostFormType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->postRepository->save($post);

            return $this->redirectToRoute('posts');
        }

        return $this->render('post_update_form.html.twig', [
            'form' => $form,
        ]);
    }
}