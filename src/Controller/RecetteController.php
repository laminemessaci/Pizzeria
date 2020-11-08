<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Repository\RecetteRepository;
use App\Service\Panier\PanierService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RecetteController extends AbstractController
{
    /**
     * @Route("/", name="recettes")
     */
    public function index(RecetteRepository  $repository, CategorieRepository $categorieRepository, PanierService $service)
    {
        $recettes = $repository->findAll();
        $categories = $categorieRepository->findAll();

        return $this->render('recette/recettes.html.twig', [
            'recettes' => $recettes,
            'categories' => $categories,
            'items' => $service->getFullCart(),
            'somme' => $service->count()
        ]);
    }

    /**
     * @Route("/home", name="home")
     */
    public function home(PanierService $service)
    {
        return $this->render('home/home.html.twig', [
            'items' => $service->getFullCart(),
            'somme' => $service->count()
        ]);
    }

}
