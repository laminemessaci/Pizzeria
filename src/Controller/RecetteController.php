<?php

namespace App\Controller;

use App\Repository\RecetteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecetteController extends AbstractController
{
    /**
     * @Route("/", name="recettes")
     */
    public function index(RecetteRepository  $repository)
    {
        $recettes = $repository->findAll();

        return $this->render('recette/recettes.html.twig', [
            'recettes' => $recettes,
        ]);
    }
}
