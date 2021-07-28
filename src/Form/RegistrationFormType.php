<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;


class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'label'=> 'Mot de passe',
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('userType', ChoiceType::class, array(
                'choices' => User::getAvailableUserTypes(),
                'choice_label' => function($choice) {
                    return $choice;
                },
                'multiple' => false,
                'label' => 'Type du compte'
            ))
            ->add('nom')
            ->add('prenom')
            ->add('dateNaissance', DateType::class, [
                'label'=>'Date de naissance',
                'widget' => 'single_text',
                
            ])
            ->add('adresse')
            ->add('ville')
            ->add('codePostal', TextType::class,['label'=>'Code Postal'])
            ->add('gouvernerat')
            ->add('pays')
            ->add('tel', TextType::class,['label'=>'Téléphone'])
            ->add('whatsapp')
            ->add('fbLink', TextType::class,['label'=>'Lien Page Facebook*'])
            ->add('iban', TextType::class,['label'=>'IBAN'])
            ->add('bic', TextType::class,['label'=>'BIC'])
            ->add('ecole', TextType::class,['label'=>'Nom de l´école /College /Lycée'])
            ->add('classe')
            ->add('ministere', TextType::class,['label'=>'Nom du Ministère'])
            ->add('webLink', TextType::class,['label'=>'Lien Page Web*'])
            ->add('photoFile', VichImageType::class, [
                'required' => false,
                'allow_delete' => false,
                'delete_label' => 'Supprimer',
                'asset_helper' => true,
                'image_uri' => true,
                'label' => 'Photo'
            ])
            ->add('passportFile', VichFileType::class, [
                'required' => false,
                'allow_delete' => false,
                'delete_label' => 'Supprimer',
                'asset_helper' => true,
                'label' => 'Passport'
            ])
            ->add('cinFile', VichFileType::class, [
                'required' => false,
                'allow_delete' => false,
                'delete_label' => 'Supprimer',
                'asset_helper' => true,
                'label' => ' Carte d\'identité Nationale'
            ])
            ->add('cvFile', VichFileType::class, [
                'required' => false,
                'allow_delete' => false,
                'delete_label' => 'Supprimer',
                'asset_helper' => true,
                'label' => 'Curriculum Vitae'
            ])
            ->add('motivationLetterFile', VichFileType::class, [
                'required' => false,
                'allow_delete' => false,
                'delete_label' => 'Supprimer',
                'asset_helper' => true,
                'label' => 'Lettre de Motivation'
            ])
            ->add('bulletinFile', VichFileType::class, [
                'required' => false,
                'allow_delete' => false,
                'delete_label' => 'Supprimer',
                'asset_helper' => true,
                'label' => 'Bulltein Numéro 3'
            ])
            ->add('diplomes', CollectionType::class, [
                'entry_type' => DiplomeFormType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'required' => false,
                'label'=>'Diplômes',
                'by_reference' => false,
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
