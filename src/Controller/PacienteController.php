<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;

class PacienteController extends AbstractController
{
    #[Route('/paciente', name: 'app_paciente')]
    public function index(): Response
    {
        $datos = [
            'Pepillo' => 'Palotes',
            'Lola' => 'Flores',
        ];

        return $this->render('index.html.twig', [
            'datos' => $datos,
        ]);
    }

    #[Route('/obtenerIniciales/{nombre}/{apellido}', name: 'obtenerIniciales')]
    public function obtenerIniciales($nombre, $apellido): Response
    {
        return new Response($nombre[0].' '.$apellido[0]);
    }

    #[Route('/inicialesPaciente/{name}/{surname}', name: 'app_inicialesPaciente')]
    public function inicialesPaciente($name, $surname): RedirectResponse
    {
        return $this->redirectToRoute('obtenerIniciales', [
            'nombre' => $name,
            'apellido' => $surname
        ]);
    }
   
}
