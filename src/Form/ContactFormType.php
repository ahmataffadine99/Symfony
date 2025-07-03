<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Votre Nom',
                'attr' => [
                    'placeholder' => 'Votre nom complet',
                    'class' => 'mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500'
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Veuillez entrer votre nom.']),
                    new Length(['min' => 2, 'max' => 100, 'minMessage' => 'Votre nom doit contenir au moins {{ limit }} caractères.']),
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Votre Email',
                'attr' => [
                    'placeholder' => 'votre.email@example.com',
                    'class' => 'mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500'
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Veuillez entrer votre adresse email.']),
                    new Email(['message' => 'Veuillez entrer une adresse email valide.']),
                ],
            ])
            ->add('subject', TextType::class, [
                'label' => 'Sujet',
                'attr' => [
                    'placeholder' => 'Le sujet de votre message',
                    'class' => 'mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500'
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Veuillez entrer un sujet.']),
                    new Length(['min' => 5, 'max' => 255, 'minMessage' => 'Le sujet doit contenir au moins {{ limit }} caractères.']),
                ],
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Votre Message',
                'attr' => [
                    'rows' => 7, 
                    'placeholder' => 'Tapez votre message ici...',
                    'class' => 'mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500'
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Veuillez entrer votre message.']),
                    new Length(['min' => 10, 'minMessage' => 'Votre message doit contenir au moins {{ limit }} caractères.']),
                ],
            ])
            
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
        ]);
    }
}