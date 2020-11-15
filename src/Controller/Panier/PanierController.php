<?php

namespace App\Controller\Panier;

use App\Entity\Recette;
use App\Service\Panier\PanierService;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class PanierController extends AbstractController
{
    /**
     * @Route("/panier", name="panier_index")
     */
    public function index(PanierService $service): Response
    {

        return $this->render('panier/panier.html.twig', [
            'items' => $service->getFullCart(),
            'total' => $service->getTotal(),
            'somme' => $service->count()
        ]);
    }

    /**
     * @Route("/panier/add/{id}", name="panier_add")
     */
    public function add(Recette $recette, PanierService $service)
    {
        $service->add($recette);
        // return $this->render('panier/addPanier.html.twig', [
        //     "recette" => $recette,
        // ]);
        return $this->redirectToRoute('recettes', [
            'items' => $service->getFullCart(),
            'somme' => $service->count()
        ]);
    }

    /**
     * @Route("/panier/remove/{id}", name="panier_remove")
     */
    public function remove(Recette $recette, PanierService $service)
    {
        $service->remove($recette);
        return $this->redirectToRoute('panier_index', [
            'items' => $service->getFullCart(),
            'somme' => $service->count()
        ]);
    }

    /*
     * Payement stripe
     */

    /**
     * @Route("/panier/success", name="success")
     */
    public function success(PanierService $service): Response
    {

        return $this->render('panier/success.html.twig', [
            'items' => $service->getFullCart(),
            'somme' => $service->count()
        ]);
    }

    /**
     * @Route("/panier/error", name="error")
     */
    public function error(PanierService $service): Response
    {

        return $this->render('panier/error.html.twig', [
            'items' => $service->getFullCart(),
            'somme' => $service->count()
        ]);
    }


    /**
     * @Route("/panier/create-checkout-session", name="checkout")
     */
    public function checkout(PanierService $service)
    {
        $panier = $service->getSession()->get('panier', []);
        //$names= $panier[$recette->getNom()];

        $total = $service->getTotal() * 100;
        //$name = strval($panier);

        Stripe::setApiKey('sk_test_51HkTZfI1nyYImKPMLCJh02TvZ81uGOTrGApvTba5EPV1X5S7qpV3UadQQyvO4cVOMI2L4YmVMTembrlbSKL6snxQ00NMJyCa7T');

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => 'Subito76',
                    ],
                    'unit_amount' => $total,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => $this->generateUrl('success', [], UrlGeneratorInterface::ABSOLUTE_URL),
            'cancel_url' => $this->generateUrl('error', [], UrlGeneratorInterface::ABSOLUTE_URL)
        ]);

        return new JsonResponse(['id' => $session->id]);


    }
}
