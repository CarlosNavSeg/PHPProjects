<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ManagerRegistry $doctrine, Request $request): Response
    {
    $repository = $doctrine->getRepository(Category::class);
    $categories = $repository->findAll();
    return $this->render('page/index.html.twig', ['categories' => $categories]);
    }


    #[Route('/about', name: 'about')]
    public function about(): Response {
        return $this->render('about/about.html.twig');
    }

    #[Route('/contact', name: 'contact')]
    public function contact(): Response {
        return $this->render('contact/contact.html.twig');
    }
}
