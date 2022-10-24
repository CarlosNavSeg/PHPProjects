<?php

namespace App\Controller;

use App\Entity\Canal;
use App\Form\CanalFormType;
use Doctrine\Persistence\ManagerRegistry;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CanalController extends AbstractController
{
    #[Route("/canal/{codigo<\d+>?1}", name: 'mostrar')]
    public function mostrar(ManagerRegistry $doctrine, $codigo): Response
    {
        $repositorio = $doctrine->getRepository(Canal::class);
        $canal  = $repositorio->find($codigo);

        return $this->render('ficha_canal.html.twig', ['canal' => $canal]);
    }

    #[Route('/canal/buscar/{texto}', name: 'buscar')]
    public function buscar(ManagerRegistry $doctrine, $texto): Response
    {
        $repositorio = $doctrine->getRepository(Canal::class);
        $canales  = $repositorio->findByNombre($texto);
        return $this->render('lista_canales.html.twig', ['canal' => $canales]);
    }
    
    #[Route('/canal/delete/{id}/', name: 'borrar_canal')]
    public function delete(ManagerRegistry $doctrine, $id): Response {
        $entityManager = $doctrine->getManager();
        $repositorio = $doctrine->getRepository(Canal::class);
        $canal = $repositorio->find($id);
        if($canal) {
            try {
                $entityManager->remove($canal);
                $entityManager->flush();
                return new Response("Canal eliminado");
            } catch(Exception $e) {
                return new Response('Error eliminando objetos');
            }
        } else {
            return $this->render('ficha_canal.html.twig', ['canal' => null]);
        }
    }

    #[Route('/canal/nuevo', name: 'nuevo_canal')]
    public function nuevo(ManagerRegistry $doctrine, Request $request) {
        $canal = new Canal();
        $formulario = $this->createForm(CanalFormType::class, $canal);
        $formulario->handleRequest($request);
        if ($formulario->isSubmitted() && $formulario->isValid()) {  
            $canal = $formulario->getData(); 
            $entityManager = $doctrine->getManager();
            $entityManager->persist($canal);
            $entityManager->flush();
            return $this->redirectToRoute('mostrar', ["codigo" => $canal->getId()]);
        }
        return $this->render('nueva.html.twig', array(
            'formulario' => $formulario->createView()
        ));
    }

    #[Route('/canal/editar/{codigo<\d+>?1}', name: 'editar_canal')]
    public function editar(ManagerRegistry $doctrine, Request $request, $codigo) {
        $repositorio = $doctrine->getRepository(Canal::class);
        $canal = $repositorio->find($codigo);
        if ($canal){
            $formulario = $this->createForm(CanalFormType::class, $canal);
            $formulario->handleRequest($request);
            if ($formulario->isSubmitted() && $formulario->isValid()) {
                $canal = $formulario->getData();
                $entityManager = $doctrine->getManager();
                $entityManager->persist($canal);
                $entityManager->flush();
                return $this->redirectToRoute('mostrar', ["codigo" => $canal->getId()]);
            } 
            return $this->render('nuevo.html.twig', array(
                'formulario' => $formulario->createView()
            ));
        }else{
            return $this->render('ficha_canal.html.twig', [
                'canal' => NULL
            ]);
    
        }
}
}
