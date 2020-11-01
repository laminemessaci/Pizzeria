<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Repository\RecetteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RecetteController extends AbstractController
{
    /**
     * @Route("/", name="recettes")
     */
    public function index(RecetteRepository  $repository, CategorieRepository $categorieRepository)
    {
        $recettes = $repository->findAll();
        $categories = $categorieRepository->findAll();

        return $this->render('recette/recettes.html.twig', [
            'recettes' => $recettes,
            'categories' => $categories
        ]);
    }

    /**
     * @Route("/home", name="home")
     */
    public function home()
    {
        return $this->render('home/home.html.twig');
    }
}
