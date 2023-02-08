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

        return $this->render('paciente/index.html.twig', [
            'datos' => $datos,
        ]);
    }

    #[Route('/paciente2', name: 'paciente2')]
    public function index2(): Response
    {
        $datos = [
            'Pepillo' => [
                'Palotes',
                '629009876'
            ],
            'Lola' => [
                'Flores',
                '629009876'
            ]
        ];

        return $this->render('paciente/index2.html.twig', [
            'datos' => $datos,
        ]);
    }

    #[Route('/detallePaciente/{nombre}/{apellido}/{telefono}', name: 'detallePaciente')]
    public function index3($nombre, $apellido, $telefono): Response
    {
        $datos = [
            'nombre' => $nombre,
            'apellido' => $apellido,
            'telefono' => $telefono
        ];

        return $this->render('paciente/detalle.html.twig', [
            'datos' => $datos,
        ]);
    }
   
}
