<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
        $presses = $this->getDoctrine()->getRepository(Post::class)->getPosts('',Post::TYPE_PRESSE,'', 4);
        
        return $this->render('home/index.html.twig',[
            'actualites' =>$actualites,
            'presses' =>$presses
        ]);
    }

    /**
     * @Route("/filter_posts", name="filter_posts")
     */
    public function filter_posts(Request $request, PostRepository $postRepository): Response
    {
        $time = $request->query->get('time', '');
        $actualites = $postRepository->getPosts('',Post::TYPE_ACTUALITE,$time, 6);
        return $this->render('home/_posts.html.twig', [
            'actualites' =>$actualites
        ]);
    }
}