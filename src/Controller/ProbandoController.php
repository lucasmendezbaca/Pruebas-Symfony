<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProbandoController extends AbstractController
{
    #[Route('/probando', name: 'probando')]
    public function index(): Response
    {
        return $this->render('probando/index.html.twig', [
            'controller_name' => 'ProbandoController',
        ]);
    }

    #[Route('/categorias', name: 'categorias')]
    public function categorias(): Response
    {
        return $this->render('probando/categorias.html.twig', [
            'controller_name' => 'ProbandoController',
        ]);
    }

    #[Route('/carrito', name: 'carrito')]
    public function carrito(): Response
    {
        return $this->render('probando/carrito.html.twig', [
            'controller_name' => 'ProbandoController',
        ]);
    }

    #[Route('/logout', name: 'logout')]
    public function logout(): Response
    {
        return $this->render('probando/logout.html.twig', [
            'controller_name' => 'ProbandoController',
        ]);
    }

}
