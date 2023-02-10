<?php

namespace App\Form;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PrimerFormType extends AbstractController
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('field_name')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }

    #[Route('/formulario', name: 'formulario')]
    public function index(Request $request): Response
    {
        $form = $this->createFormBuilder()
            ->add('nombre', TextType::class)
            ->add('apellido', TextType::class)
            ->add('email', EmailType::class)
            ->add('genero', ChoiceType::class, array(
                'choices' => array(
                    'm' => 'Male',
                    'f' => 'Female'
                ),
                'required'    => false,
                'placeholder' => 'Choose your gender',
                'empty_data'  => null
            ))
            ->add('telefono', TextType::class)
            ->add('ver-datos', SubmitType::class, ['label' => 'Ver datos'])
            ->getForm();
        
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();

            return $this->render('formulario/mostrarFormulario.html.twig', [
                'data' => $data,
            ]);
        }


        return $this->render('formulario/formulario.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
}
