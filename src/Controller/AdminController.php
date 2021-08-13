<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
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
    public function deleteUser(User $user, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();

        $referer = $request->headers->get('referer');
        return $this->redirect($referer);
    }

    /**
     * @IsGranted("ROLE_SUPER_ADMIN")
     * @Route("/update/user_status/{id}", name="update_user_status")
     */
    public function updateUserStatus(User $user, Request $request):Response
    {
        $status = $request->query->get('status','');
        if($status)
        {
            $user->setStatus($status);
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            
        }

        $referer = $request->headers->get('referer');
        return $this->redirect($referer);
    }
}
