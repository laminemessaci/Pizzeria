<?php

namespace App\Controller\Panier;

use App\Entity\Recette;
use App\Service\Panier\PanierService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends AbstractController
{
    /**
     * @Route("/panier", name="panier_index")
     */
    public function index(PanierService $service): Response
    {

        return $this->render('panier/panier.html.twig', [
            'items' => $service->getFullCart(),
            'total' => $service->getTotal()
        ]);
    }

    /**
     * @Route("/panier/add/{id}", name="panier_add")
     */
    public function add(Recette $recette, PanierService $service)
    {
        $service->add($recette);
        return $this->render('panier/addPanier.html.twig', [
            "recette" => $recette,
        ]);
    }

    /**
     * @Route("/panier/remove/{id}", name="panier_remove")
     */
    public function remove(Recette $recette, PanierService $service)
    {
        $service->remove($recette);
        return $this->redirectToRoute('panier_index');
    }
}
