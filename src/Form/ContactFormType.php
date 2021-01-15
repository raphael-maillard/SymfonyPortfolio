<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'required'   => true,
                'label' => 'Prénom',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])

            ->add('lastname', TextType::class, [
                'required'   => true,
                'label' => 'Nom',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])

            ->add('email', EmailType::class, [
                'required'   => true,
                'label' => 'Votre email',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('message', TextareaType::class, [
                'required'   => true,
                'label' => 'Votre message',
                'attr' => [
                    'class' => 'col-12'
                ]
            ])

            ->add('agreeTerms', CheckboxType::class, [
                'required'   => true,
                'label' => "Préparer l'envoie",
                'constraints' => [
                    new IsTrue([
                        'message' => 'Êtes-vous sûr d\'envoyer ce message',
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
