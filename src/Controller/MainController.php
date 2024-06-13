<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Repository\ArticlesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mime\Email; // Utiliser le bon namespace pour la classe Email

class MainController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ArticlesRepository $articlesRepository): Response
    {
        // Récupérer tous les articles depuis le repository
        $articles = $articlesRepository->findAll();

        return $this->render('main/index.html.twig', [
            'articles' => $articles,
        ]);
    }
    #[Route('/contact', name: 'contact')] public function contact(): Response
    {
        return $this->render('main/contact.html.twig', ['contact_param' => 'Salut les amis!',]);
    }
}