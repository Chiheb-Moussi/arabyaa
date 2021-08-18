<?php

namespace App\EventSubscriber;

use App\Event\UserDeletedEvent;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Uid\Uuid;

class UpdateUserEmailSubscriber implements EventSubscriberInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    

    public static function getSubscribedEvents()
    {
        return [
            UserDeletedEvent::class => 'onUserDeleteEvent',
        ];
    }

    public function onUserDeleteEvent(UserDeletedEvent $event): void
    {
        $user = $event->getUser();
        $email = $user->getEmail();
        $user->setOldEmail($email);
        $user->setEmail(Uuid::v4());
        $this->entityManager->flush();

    }

}