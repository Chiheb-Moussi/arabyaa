<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/post")
 */
class PostController extends AbstractController
{
    /**
     * @Route("/", name="post_index", methods={"GET"})
     */
    public function index(PostRepository $postRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $page = $request->query->get('page', 1);
        $search =$request->query->get('search', '');
        $type = $request->query->get('type', '');
        $time = $request->query->get('time', '');
        $posts_data = $postRepository->getPosts($search,$type,$time);
        
        $posts = $paginator->paginate($posts_data, $page, 6);

        $timeFilters = [
            "newest"=>"Le plus récent",
            "lt_week"=>"Moins d'une semaine",
            "lt_month"=>"Moins d'un mois",
            "lt_year"=> "Moins d'un an"
        ];

        $selected_timeFilter = $time ? $timeFilters[$time] : $timeFilters['newest'];

        $not_selected_timeFilters = [];

        foreach($timeFilters as $key=>$time)
        {
            if($time != $selected_timeFilter) $not_selected_timeFilters[$key]=$time;
        }


        $selected_menu = "post";
        return $this->render('post/index.html.twig', [
            'posts' => $posts,
            'selected_menu' => $selected_menu,
            'search'=>$search,
            'type'=>$type,
            'selected_timeFilter'=>$selected_timeFilter,
            'not_selected_timeFilters'=>$not_selected_timeFilters
        ]);
    }

    /**
     * @Route("/new", name="post_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $post->setUser($this->getUser());
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($post);
            $entityManager->flush();

            return $this->redirectToRoute('actualites', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('profile/new_post.html.twig', [
            'post' => $post,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{slug}", name="post_show", methods={"GET"})
     */
    public function show(Post $post): Response
    {
        $latest_posts = $this->getDoctrine()->getRepository(Post::class)->findBy([],['createdAt'=>'desc'],5);
        $selected_menu = "post";
        return $this->render('post/show.html.twig', [
            'post' => $post,
            'selected_menu'=> $selected_menu,
            'latest_posts'=> $latest_posts
        ]);
    }

    /**
     * @Route("/{id}/edit", name="post_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Post $post): Response
    {
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('post_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('post/edit.html.twig', [
            'post' => $post,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="post_delete", methods={"POST"})
     */
    public function delete(Request $request, Post $post): Response
    {
        if ($this->isCsrfTokenValid('delete'.$post->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($post);
            $entityManager->flush();
        }

        return $this->redirectToRoute('post_index', [], Response::HTTP_SEE_OTHER);
    }
}
