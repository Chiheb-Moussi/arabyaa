<?php

namespace App\Controller\FrontOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
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
        return $this->render('frontoffice/profile/index.html.twig', ['user'=>$user]);
    }
}
