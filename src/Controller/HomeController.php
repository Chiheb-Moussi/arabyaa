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
    public function index(): Response
    {
        $actualites = $this->getDoctrine()->getRepository(Post::class)->getPosts('',Post::TYPE_ACTUALITE,'', 6);

        $actualites_lt_week = $this->getDoctrine()->getRepository(Post::class)->getPosts('',Post::TYPE_ACTUALITE,'lt_week', 6);
        $actualites_lt_month = $this->getDoctrine()->getRepository(Post::class)->getPosts('',Post::TYPE_ACTUALITE,'lt_week', 6);

        $presses = $this->getDoctrine()->getRepository(Post::class)->getPosts('',Post::TYPE_PRESSE,'', 4);
        
        return $this->render('home/index.html.twig',[
            'actualites' =>$actualites,
            'actualites_lt_week' =>$actualites_lt_week,
            'actualites_lt_month' =>$actualites_lt_month,
            'presses' =>$presses
        ]);
    }
}
