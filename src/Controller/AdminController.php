<?php

namespace App\Controller;

use App\Entity\User;
use App\Event\UserDeletedEvent;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Uid\Uuid;

/**
 * @Route("/admin")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="dashboard")
     */
    public function dashboard(): Response
    {
        $user = $this->getUser();
        $left_menu= "dashboard";
        return $this->render('admin/dashboard.html.twig', [
            'left_menu'=>$left_menu,
            'user'=>$user
        ]);
    }

    /**
     * @Route("/users", name="users", methods={"GET"})
     */
    public function users(Request $request, PaginatorInterface $paginator): Response
    {
        $filters=[];
        $page = $request->query->get('page', 1);
        $userType = $request->query->get('userType','');
        if($userType) $filters['userType']=$userType;
        
        $users_data = $this->getDoctrine()->getRepository(User::class)->findBy($filters,['createdAt'=>'desc']);
        $users = $paginator->paginate($users_data, $page, 10);

        $all_userTypes = User::getAvailableUserTypes(true);
        $selected_userType= $userType ? $userType : 'Tous les utilisateurs';
        
        $not_selected_userTypes = [];
        if($selected_userType != 'Tous les utilisateurs') $not_selected_userTypes[]='Tous les utilisateurs';
        foreach($all_userTypes as $userType) {
            if($userType != $selected_userType) $not_selected_userTypes[]=$userType;
        }

        $left_menu= "users";
        return $this->render('admin/users.html.twig',[
            'left_menu'=>$left_menu,
            'users'=>$users,
            'selected_userType'=>$selected_userType,
            'not_selected_userTypes'=>$not_selected_userTypes
        ]);
    }

    /**
     * @Route("/delete/user/{id}", name="deleteUser")
     */
    public function deleteUser(User $user, Request $request, EventDispatcherInterface $eventDispatcher)
    {
        $eventDispatcher->dispatch(new UserDeletedEvent($user));
        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();

        $referer = $request->headers->get('referer');
        return $this->redirect($referer);
    }

    /**
     * @IsGranted("ROLE_SUPER_ADMIN")
     * @Route("/update/approve_user/{id}", name="approve_user")
     */
    public function approve_user(User $user, MailerInterface $mailer):Response
    {
        
        $user->setStatus(User::STATUS_APPROUVE);
        $em = $this->getDoctrine()->getManager();
        $em->flush();

        
        //send email
        $email = (new TemplatedEmail())
                ->to($user->getEmail())
                ->subject('Inscription Approuvé')
                ->htmlTemplate('emails/approve_user.html.twig');
        $mailer->send($email);

        
        return $this->redirectToRoute('user_detail', ['id'=>$user->getId()]);
    }

    /**
     * @IsGranted("ROLE_SUPER_ADMIN")
     * @Route("/modal_refuse_user/{id}", name="modal_refuse_user")
     */
    public function modal_refuse_user(User $user,Request $request):Response
    {
        return $this->render('admin/modal_refuse_user.html.twig', [
            'user'=> $user
        ]);
    }

    /**
     * @IsGranted("ROLE_SUPER_ADMIN")
     * @Route("/update/refuse_user/{id}", name="refuse_user", methods={"POST"})
     */
    public function refuse_user(User $user, Request $request, MailerInterface $mailer):Response
    {
        $message_refus= $request->request->get('message_refus','');
        $user->setMessageRefus($message_refus);
        $user->setStatus(User::STATUS_REFUSE);
        $em = $this->getDoctrine()->getManager();
        $em->flush();
            
        //send email
        $email = (new TemplatedEmail())
                ->to($user->getEmail())
                ->subject('Inscription Refusé')
                ->htmlTemplate('emails/refuse_user.html.twig')
                ->context([
                    'message_refus' => $message_refus
                ]);
        $mailer->send($email);
        
        return $this->redirectToRoute('user_detail', ['id'=>$user->getId()]);
    }
}
