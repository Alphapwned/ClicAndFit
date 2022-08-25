<?php

namespace App\Form;

use App\Entity\Annonces;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AnnoncesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3'
                ],
                'label' => "Titre"
            ])
            ->add('description', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3'
                ],
                'label' => "Description"
            ])
            ->add('phone', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3'
                ],
                'label' => "Numéro de téléphone"
            ])
            ->add('zipcode', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3'
                ],
                'label' => "Code postal"
            ])
            ->add('imageFile', VichImageType::class, [
                'attr' => [
                    'class' => 'form-control mb-3'
                ],
                'label' => "Upload d'image"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Annonces::class,
        ]);
    }
}
