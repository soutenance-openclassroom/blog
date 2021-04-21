<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $post = new Post();
        $post->setTitre("Ceci est un autre titre");
        $post->setChapo("Ceci est un autre chapo");
        $post->setContenu("Ceci est un autre contenu");
        $post->setAuteur("Ceci est un autre auteur");
        $post->setLastEdit(new \DateTime());
        $em->persist($post);
        $em->flush();
        return $this->render('home/index.html.twig', [
            'post' => $post,
        ]);
    }
}
