<?php

namespace App\Service\Panier;

use App\Entity\Recette;
use App\Repository\RecetteRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class PanierService
{
    protected $session;
    protected $repository;


    /**
     * @return SessionInterface
     */
    public function getSession(): SessionInterface
    {
        return $this->session;
    }



    /**
     * PanierService constructor.
     * @param $session
     */
    public function __construct( SessionInterface $session, RecetteRepository $repository)
    {
        $this->session = $session;
        $this->repository = $repository;
    }


    public function add(Recette $recette)
    {

        $panier = $this->session->get('panier', []);

        if (!empty($panier[$recette->getId()])) {
            $panier[$recette->getId()]++;
        } else {
            $panier[$recette->getId()] = 1;
        }
        $this->session->set('panier', $panier);
        //dd($session->get('panier'));

    }

    public function remove(Recette $recette)
    {

        $panier = $this->session->get('panier', []);
        if (!empty($panier)) {
            unset($panier[$recette->getId()]);
        }
        $this->session->set('panier', $panier);

    }

    public function getFullCart(): array
    {
        $panier = $this->session->get('panier', []);
        $panierWithData = [];
        foreach ($panier as $id => $quantity) {
            $panierWithData[] = [
                'recette' => $this->repository->find($id),
                'quantity' => $quantity
            ];
        }
        return $panierWithData;
    }

    public function getTotal(): float
    {
        // le totel prix
        $total = 0;
        foreach ($this->getFullCart() as $item) {
            $total += $item['recette']->getPrix() * $item['quantity'];
        }
        //dd($panierWithData);
        return $total;
    }

    public function count(){
        $panier = $this->session->get('panier', []);
        return array_sum($panier);
    }
}