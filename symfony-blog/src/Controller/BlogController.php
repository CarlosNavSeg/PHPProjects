<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Post;
use App\Form\ContactFormType;
use App\Form\PostFormType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class BlogController extends AbstractController
{
    
    #[Route('/blog', name: 'blog')]
    public function findAllPaginated(ManagerRegistry $doctrine, int $page = 1): Response
    {
        $repository = $doctrine->getRepository(Post::class);
        $posts = $repository->findAllPaginated($page);
        return $this->render('blog/blog.html.twig', [
            'posts' => $posts,
        ]);
    }


    #[Route('/blog/post/{slug}', name: 'blogpost')]
    public function blogpost(ManagerRegistry $doctrine, $slug): Response {
    {
    $repositorio = $doctrine->getRepository(Post::class);
    $post = $repositorio->findOneBy(["slug"=>$slug]);
    return $this->render('blog/single_post.html.twig', [
        'post' => $post,
    ]);
    }
    }

    #[Route('/thankyou', name:'thankyou')]
    public function thanks(): Response {
        return $this->render('thankyou/thankyou.html.twig');
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
        return $this->render('contact/contact.html.twig', array(
            'form' => $form->createView()    
        ));
    }
    
    #[Route("/blog/new", name:"new_post")]
    public function newPost(ManagerRegistry $doctrine, HttpFoundationRequest $request, SluggerInterface $slugger): Response
    {
    $post = new Post();
    $form = $this->createForm(PostFormType::class, $post);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
        $post = $form->getData();   
        $post->setSlug($slugger->slug($post->getTitle()));
        $post->setPostUser($this->getUser());
        $post->setNumLikes(0);
        $post->setNumComments(0);
        $entityManager = $doctrine->getManager();    
        $entityManager->persist($post);
        $entityManager->flush();
        return $this->render('blog/new_post.html.twig', array(
            'form' => $form->createView()    
        ));
    }
    return $this->render('blog/new_post.html.twig', array(
        'form' => $form->createView()    
    ));
    }

    
}
