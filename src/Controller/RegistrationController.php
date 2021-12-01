<?php

namespace App\Controller;

use App\Entity\User;
use App\Event\UserCreatedEvent;
use App\Form\RegistrationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, ValidatorInterface $validator, EventDispatcherInterface $eventDispatcher): Response
    {
        
        $user = new User();
        $type = $request->query->get('type','');
        if($type) {
            $user->setUserType($type);
        }
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        //validation
        

        $errors=[];
        $error_email='';
        $error_plainPassword='';
        $error_tel='';
        $error_whatsapp='';
        $error_iban='';
        $error_bic='';
        $error_fbLink='';
        $error_webLink='';
        $error_codePostal='';
        $error_photoFile='';
        $error_cinFile='';
        $error_cvFile='';
        $error_motivationLetterFile='';
        $error_bulletinFile='';
        $error_diplomes='';
        
        if ($form->isSubmitted()) {
            
            
            $validator_errors = $validator->validate($user);
            foreach ($validator_errors as $error) {
                if($error->getPropertyPath() == 'email') {
                    $error_email='has-error';
                }elseif ($error->getPropertyPath() == 'plainPassword') {
                    $error_plainPassword='has-error';
                }elseif ($error->getPropertyPath() == 'tel') {
                    $error_tel='has-error';
                }elseif ($error->getPropertyPath() == 'whatsapp') {
                    $error_whatsapp='has-error';
                }elseif ($error->getPropertyPath() == 'iban') {
                    $error_iban='has-error';
                }elseif ($error->getPropertyPath() == 'bic') {
                    $error_bic='has-error';
                }elseif ($error->getPropertyPath() == 'fbLink') {
                    $error_fbLink='has-error';
                }elseif ($error->getPropertyPath() == 'webLink') {
                    $error_webLink='has-error';
                }elseif ($error->getPropertyPath() == 'codePostal') {
                    $error_codePostal='has-error';
                }elseif ($error->getPropertyPath() == 'photoFile') {
                    $error_photoFile='has-error';
                }elseif ($error->getPropertyPath() == 'cinFile') {
                    $error_cinFile='has-error';
                }elseif ($error->getPropertyPath() == 'cvFile') {
                    $error_cvFile='has-error';
                }elseif ($error->getPropertyPath() == 'motivationLetterFile') {
                    $error_motivationLetterFile='has-error';
                }elseif ($error->getPropertyPath() == 'bulletinFile') {
                    $error_bulletinFile='has-error';
                }elseif (str_contains($error->getPropertyPath(), 'diplomeFile')) {
                    $error_diplomes='has-error';
                }
                $errors[$error->getPropertyPath()]=$error->getMessage();
            }
        }
        

        if ($form->isSubmitted() && $form->isValid()) {
            if($user->getUserType() == User::USER_TYPE_PARENT) { 

                $children_array=$request->request->get('children',[]);
                $children= array_values($children_array);

                $user->setChildren($children);
            }
            
            // encode the plain password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $roles = [$user->getRoleByUserType($user->getUserType())];
            $user->setRoles($roles);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            $eventDispatcher->dispatch(new UserCreatedEvent($user));

            return $this->redirectToRoute('registration_success');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
            'without_nav'=> true,
            'errors'=>$errors,
            'error_email'=>$error_email,
            'error_plainPassword'=>$error_plainPassword,
            'error_tel' => $error_tel,
            'error_whatsapp' => $error_whatsapp,
            'error_iban' => $error_iban,
            'error_bic' => $error_bic,
            'error_fbLink' => $error_fbLink,
            'error_webLink' => $error_webLink,
            'error_codePostal' => $error_codePostal,
            'error_photoFile' => $error_photoFile,
            'error_cinFile' => $error_cinFile,
            'error_cvFile' => $error_cvFile,
            'error_motivationLetterFile' => $error_motivationLetterFile,
            'error_bulletinFile' => $error_bulletinFile,
            'error_diplomes' => $error_diplomes
        ]);
    }

    /**
     * @Route("/registration_success", name="registration_success")
     */
    public function registration_success(): Response
    {
        return $this->render('registration/register_success.html.twig', [
            'without_nav'=> true
        ]);
    }
}
