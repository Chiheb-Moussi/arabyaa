<?php

namespace App\Controller;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/contact")
 */
class ContactController extends AbstractController
{
    /**
     * @Route("/", name="contact", methods={"GET", "POST"})
     */
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $this->addFlash('success', 'L\'email a été envoyé avec succès');
        if($request->isMethod('post'))
        {
            $contact = $request->request->get('contact');

            $email = (new TemplatedEmail())
                ->from($contact['email'])
                ->to('info@araabya.com')
                ->subject('Contact')
                ->htmlTemplate('emails/contact.html.twig')
                ->context([
                    'name'=>$contact['name'],
                    'tel'=>$contact['tel'],
                    'webLink'=>$contact['webLink'],
                    'message'=>$contact['message']
                ]);
            $mailer->send($email);

            $this->addFlash('success', 'L\'email a été envoyé avec succès');

        }
        $selected_menu = "contact";
        return $this->render('contact/index.html.twig', [
            'selected_menu'=>$selected_menu
        ]);
    }
}
