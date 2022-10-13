<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IniContollerController extends AbstractController
{
    #[Route('/', name: 'inicio')]
    public function inicio(): Response
    {
        return new Response('Bienvenido a la pagina de contactos') ;
    }
        
}
