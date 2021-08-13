<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class,[
                'label' => 'Titre de l\'article'
            ])
            ->add('content', TextareaType::class,[
                'label' => 'Contenu de l\'article'
            ])
            ->add('type', ChoiceType::class, array(
                'choices' => [Post::TYPE_ACTUALITE, Post::TYPE_PRESSE],
                'choice_label' => function($choice) {
                    return $choice;
                },
                'multiple' => false,
                'label' => 'Type d\'article'
            ))
            ->add('imageFile', VichImageType::class, [
                'required' => false,
                'allow_delete' => false,
                'delete_label' => 'Supprimer',
                'asset_helper' => true,
                'image_uri' => true,
                'label' => 'Image'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
