<?php

namespace App\Controller;

use App\Entity\Provincia;
use App\Form\ProvinciaFormType;
use Doctrine\Persistence\ManagerRegistry;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProvinciaController extends AbstractController
{
    #[Route('/provincia', name: 'app_provincia')]
    public function index(): Response
    {
        return $this->render('provincia/index.html.twig', [
            'controller_name' => 'ProvinciaController',
        ]);
    }
    #[Route('provincia/{codigo<\d+>?1}', name: "ficha_provincia")]
    public function ficha(ManagerRegistry $doctrine, $codigo): Response
    {
        $repositorio = $doctrine->getRepository(Provincia::class);
        $provincia =  $repositorio->find($codigo);
        return $this->render('ficha_provincia.html.twig', ['provincia' => $provincia]);

    }
    #[Route('/provincia/nueva', name: 'app_provincia')]
    public function nueva(ManagerRegistry $doctrine, Request $request) {
        $provincia = new Provincia();
        $formulario = $this->createForm(ProvinciaFormType::class, $provincia);
        $formulario -> handleRequest($request);
        if($formulario->isSubmitted() && $formulario->isValid()) {
            $provincia = $formulario->getData();
            $manejarEntidades = $doctrine->getManager();
            $manejarEntidades->persist($provincia);
            $manejarEntidades->flush();
            return $this->redirectToRoute('ficha_provincia', ["codigo" => $provincia->getId()]);
        }
        return $this->render('nuevo.html.twig', array(
            'formulario' => $formulario->createView()
        ));
    }
    #[Route('/provincia/delete/{id}/', name: 'borrar_provincia')]
    public function delete(ManagerRegistry $doctrine, $id): Response {
        $entityManager = $doctrine->getManager();
        $repositorio = $doctrine->getRepository(Provincia::class);
        $provincia = $repositorio->find($id);
        if($provincia) {
            try {
                $entityManager->remove($provincia);
                $entityManager->flush();
                return new Response("Contacto eliminado");
            } catch(Exception $e) {
                return new Response('Error eliminando objetos');
            }
        } else {
            return $this->render('ficha_contacto.html.twig', ['contacto' => null]);
        }
    }
    #[Route('/provincia/editar/{id}', name: 'app_provincia')]
    public function editar(ManagerRegistry $doctrine, Request $request, $id) {
        $repositorio = $doctrine->getRepository(Provincia::class);
        $provincia = $repositorio->find($id);
        $formulario = $this->createForm(ProvinciaFormType::class, $provincia);
        $formulario -> handleRequest($request);
        if($formulario->isSubmitted() && $formulario->isValid()) {
            $provincia = $formulario->getData();
            $manejarEntidades = $doctrine->getManager();
            $manejarEntidades->persist($provincia);
            $manejarEntidades->flush();
            return $this->redirectToRoute('ficha_provincia', ["codigo" => $provincia->getId()]);
        }
        return $this->render('nuevo.html.twig', array(
            'formulario' => $formulario->createView()
        ));
    }

}
