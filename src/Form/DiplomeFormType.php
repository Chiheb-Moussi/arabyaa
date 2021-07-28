<?php

namespace App\Form;

use App\Entity\Diplome;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;


class DiplomeFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('diplomeFile')
            ->add('diplomeFile', VichFileType::class , [
                'required' => false,
                'allow_delete' => false,
                'delete_label' => 'Supprimer',
                'asset_helper' => true,
                'label' => 'Diplôme'
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Diplome::class,
        ]);
    }
}