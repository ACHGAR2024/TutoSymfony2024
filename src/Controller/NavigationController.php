<?php

namespace App\Controller;

use App\Entity\Articles;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NavigationController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        return $this->render('navigation/index.html.twig');
    }

    #[Route('/articles', name: 'articles_list')]
    public function articlesList(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $articles = $entityManager->getRepository(Articles::class)->findAll();

        return $this->render('navigation/articles_list.html.twig', [
            'articles' => $articles,
        ]);
    }
}