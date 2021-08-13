<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/contact")
 */
class ContactController extends AbstractController
{
    /**
     * @Route("/", name="contact")
     */
    public function index(): Response
    {
        $selected_menu = "contact";
        return $this->render('contact/index.html.twig', [
            'selected_menu'=>$selected_menu
        ]);
    }
}
