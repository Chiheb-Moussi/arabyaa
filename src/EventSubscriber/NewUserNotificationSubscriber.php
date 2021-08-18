<?php

namespace App\EventSubscriber;

use App\Event\UserCreatedEvent;
use App\Repository\UserRepository;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class NewUserNotificationSubscriber implements EventSubscriberInterface
{
    private $mailer;
    private $userRepository;
    private $urlGenerator;

    public function __construct(MailerInterface $mailer, UserRepository $userRepository, UrlGeneratorInterface $urlGenerator)
    {
        $this->mailer = $mailer;
        $this->userRepository = $userRepository;
        $this->urlGenerator = $urlGenerator;
    }

    

    public static function getSubscribedEvents()
    {
        return [
            UserCreatedEvent::class => 'onUserCreatedEvent',
        ];
    }

    public function onUserCreatedEvent(UserCreatedEvent $event): void
    {
        $user = $event->getUser();
        $emails= $this->userRepository->getAdminEmails();
        $email_addresses = [];
        foreach($emails as $email) {
            $email_addresses[] = $email['email'];
        }

        $link_user = $this->urlGenerator->generate('user_detail',['id'=>$user->getId()], UrlGeneratorInterface::ABSOLUTE_URL);

        $email = (new TemplatedEmail())
                ->to(...$email_addresses)
                ->subject('Nouvelle Inscription')
                ->htmlTemplate('emails/new_user_notification.html.twig')
                ->context([
                    'date_creation'=>new \DateTime('now'),
                    'link_user' => $link_user,
                ]);
        $this->mailer->send($email);

    }

}