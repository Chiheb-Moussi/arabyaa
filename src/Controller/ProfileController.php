<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @Route("/profile")
 */
class ProfileController extends AbstractController
{
    /**
     * @Route("/", name="user_profile")
     */
    public function index(Request $request, ValidatorInterface $validator): Response
    {
        $user = $this->getUser();
        $errors = [];
        if($request->isMethod('POST')){
            $user_parameters = $request->request->get('user_parameters','');
            if($user_parameters) {
                if($user->getUserType() != User::USER_TYPE_PARTENARIAT) {
                    $user->setNom($user_parameters['nom']);
                    $user->setPrenom($user_parameters['prenom']);
                }else {
                    $user->setMinistere($user_parameters['ministere']);
                }
                $user->setEmail($user_parameters['email']);
                $errors = $validator->validate($user, new UniqueEntity(['email'], "Il y a déjà un compte avec cet email!"));
            }
            
            $user_informations = $request->request->get('user_informations','');
            if($user_informations) {
                $properties=['tel','whatsapp','iban','bic','fbLink','webLink'];
                $user->setDateNaissance(new \DateTime($user_informations['dateNaissance']));
                $user->setTel($user_informations['tel']);
                $user->setFbLink($user_informations['fbLink']);
                if($user->getUserType() != User::USER_TYPE_PARTENARIAT) {
                    $user->setWhatsapp($user_informations['whatsapp']);
                    $user->setIban($user_informations['iban']);
                    $user->setBic($user_informations['bic']);

                }else {
                    $user->setWebLink($user_informations['webLink']);
                }
                $errors = $validator->validate($user);
                foreach($errors as $index=>$error) {
                    if(!in_array($error->getPropertyPath(), $properties))
                    {
                        $errors->remove($index);
                    }
                }
            }

            $user_addresse = $request->request->get('user_addresse','');
            if($user_addresse) {
                $user->setPays($user_addresse['pays']);
                $user->setVille($user_addresse['ville']);
                $user->setGouvernerat($user_addresse['gouvernerat']);
                $user->setCodePostal($user_addresse['codePostal']);
                $user->setAdresse($user_addresse['adresse']);
            }

            if(($errors && !$errors->count()) || $user_addresse) {
                $em= $this->getDoctrine()->getManager();
                $em->flush($user);
                $this->addFlash(
                    'success',
                    'Votre profil a été mis à jour avec succés'
                );
            }
            
        }

        $left_menu='user_profile';
        return $this->render('profile/index.html.twig', [
            'user'=>$user,
            'left_menu'=>$left_menu,
            'errors' =>$errors
        ]);
    }

    /**
     * @Route("/user_actualites", name="user_actualites")
     */
    public function user_actualites(PaginatorInterface $paginator, Request $request): Response
    {
        $page = $request->query->get('page', 1);
        $posts_data = $this->getDoctrine()->getRepository(Post::class)->findBy(['user'=>$this->getUser()],['createdAt'=>'desc']);
        $posts = $paginator->paginate($posts_data, $page, 6);

        $selected_menu = "post";
        $left_menu='user_actualites';
        return $this->render('profile/actualites.html.twig', [
            'posts' => $posts,
            'selected_menu' => $selected_menu,
            'left_menu'=>$left_menu
        ]);
    }

    /**
     * @Route("/user_detail/{id}", name="user_detail")
     */
    public function user_detail(User $user): Response
    {
        
        return $this->render('profile/user_detail.html.twig',[
            'user'=>$user
        ]);
    }

    
}
