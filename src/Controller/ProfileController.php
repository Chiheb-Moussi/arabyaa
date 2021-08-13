<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/profile")
 */
class ProfileController extends AbstractController
{
    /**
     * @Route("/", name="user_profile")
     */
    public function index(): Response
    {
        $user = $this->getUser();
        return $this->render('profile/index.html.twig', ['user'=>$user]);
    }

    /**
     * @Route("/actualites", name="actualites")
     */
    public function actualites(PaginatorInterface $paginator, Request $request): Response
    {
        $page = $request->query->get('page', 1);
        $posts_data = $this->getDoctrine()->getRepository(Post::class)->findBy(['user'=>$this->getUser()],['createdAt'=>'desc']);
        $posts = $paginator->paginate($posts_data, $page, 6);

        $selected_menu = "post";
        return $this->render('profile/actualites.html.twig', [
            'posts' => $posts,
            'selected_menu' => $selected_menu
        ]);
    }
}
