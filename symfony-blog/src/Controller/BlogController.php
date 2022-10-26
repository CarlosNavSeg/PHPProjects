<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactFormType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    #[Route('/blog', name: 'blog')]
    public function blog(): Response {
        return $this->render('blog/blog.html.twig');
    }

    #[Route('/blog/post/', name: 'blogpost')]
    public function blogpost(): Response {
        return $this->render('blog/post/single_post.html.twig');
    }

    #[Route('/thankyou', name:'thankyou')]
    public function thanks(): Response {
        return $this->render('thankyou.html.twig');
    }
    
    #[Route("/contact", name: "contact")]
    public function contact(ManagerRegistry $doctrine, Request $request): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactFormType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contacto = $form->getData();    
            $entityManager = $doctrine->getManager();    
            $entityManager->persist($contacto);
            $entityManager->flush();
            return $this->redirectToRoute('thankyou', []);
        }
        return $this->render('page/contact.html.twig', array(
            'form' => $form->createView()    
        ));
}


}
