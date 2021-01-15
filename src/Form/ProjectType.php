<?php

namespace App\Form;

use App\Entity\Project;
use App\Entity\Technologie;
use Symfony\Component\Form\AbstractType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class,[
                'required' => true,
                'label' =>false,
                'attr' => [
                    'class' => 'form-control mt-2',
                    'placeholder' => 'Nom'
                ]])
            // ->add('imageName')
            ->add('link',TextType::class,[
                'required' => false,
                'label' =>false,
                'attr' => [
                    'class' => 'form-control mt-2',
                    'placeholder' => 'Lien'
                ]])
            ->add('resume', TextareaType::class, [
                'required' => true,
                'label' =>false,
                'attr' => [
                    'class' => 'form-control mt-2',
                    'placeholder' => 'Résumé'
                ],
                ])
            // ->add('linkSourceCode')
            ->add('technologies', EntityType::class, [
                'required' => true,
                'label' => 'Les technologies utilisées ',
                'class' => Technologie::class,
                'choice_label' => 'name',
                'expanded' => true,
                'multiple' => true,
                'attr' => [
                    'class' => 'form-check'
                ]
                
            ])
            ->add('imageFile', VichFileType::class, [
                'required' => false,
                'label' => 'Image du projet',
                'attr' => [
                    'class' => 'form-control mt-2',
                ]])
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
