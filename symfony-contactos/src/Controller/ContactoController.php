<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
 

class ContactoController extends AbstractController
{
    #[Route('/contacto/{codigo}', name: 'ficha')]
    public array $resultados;
    public $contactos;
    public function ficha($codigo) {
        
        $contactos = array([
        1 => ["nombre" => "Juan Pérez", "telefono" => "524142432", "email" => "juanp@ieselcaminas.org"],
        2 => ["nombre" => "Ana López", "telefono" => "58958448", "email" => "anita@ieselcaminas.org"],
        5 => ["nombre" => "Mario Montero", "telefono" => "5326824", "email" => "mario.mont@ieselcaminas.org"],
        7 => ["nombre" => "Laura Martínez", "telefono" => "42898966", "email" => "lm2000@ieselcaminas.org"],
        9 => ["nombre" => "Nora Jover", "telefono" => "54565859", "email" => "norajover@ieselcaminas.org"]
        ]);
    //Si no existe el elemento con dicha clave devolvemos null
    $resultado = ($this->$contactos[$codigo] ?? null);
    return $this->render('ficha_contacto.html.twig', [
    'contacto' => $resultado
    ]);
}
    
    #[Route('/contacto/buscar/{texto}', name: 'ficha')]
    public function buscar($texto): Response {
        $contactos = array([
            1 => ["nombre" => "Juan Pérez", "telefono" => "524142432", "email" => "juanp@ieselcaminas.org"],
    
            2 => ["nombre" => "Ana López", "telefono" => "58958448", "email" => "anita@ieselcaminas.org"],
    
            5 => ["nombre" => "Mario Montero", "telefono" => "5326824", "email" => "mario.mont@ieselcaminas.org"],
    
            7 => ["nombre" => "Laura Martínez", "telefono" => "42898966", "email" => "lm2000@ieselcaminas.org"],
    
            9 => ["nombre" => "Nora Jover", "telefono" => "54565859", "email" => "norajover@ieselcaminas.org"]
        ]);
        $resultados = "";
        $resultados -> array_filter($this->$contactos,
        function($contacto) use ($texto) {
            return strpos($contacto["nombre"], $texto) !== FALSE;
        });
        if(count($resultados)) {
            $html = '<ul>';
                $html .= "<li>" . $codigo . "</li>";
                $html .= "<li>" . $resultados['nombre'] . "</li>";
                $html .= "<li>" . $resultados['telefono'] . "</li>";
                $html .= "<li>" . $resultados['email'] . "</li>";
            $html .= '</ul>';
            return new Response("<html><body>$html</body>");
        }else{
            return new Response("<html><body>Contacto $codigo no encontrado </body>");
        }
        }
}
         


