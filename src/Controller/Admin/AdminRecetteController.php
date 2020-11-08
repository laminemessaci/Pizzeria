<?php

namespace App\Controller\Admin;

use App\Entity\Recette;
use App\Form\RecetteType;
use App\Repository\CategorieRepository;
use App\Repository\RecetteRepository;
use App\Service\Panier\PanierService;
use Doctrine\Persistence\ObjectManager;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminRecetteController extends AbstractController
{
    /**
     * @Route("/admin/recette", name="admin_recette")
     */
    public function index(RecetteRepository $repository, CategorieRepository $categorieRepository, PanierService $service): Response
    {

        $recettes = $repository->findAll();
        $categories = $categorieRepository->findAll();
        return $this->render('admin/adminRecette.html.twig', [
            'recettes' => $recettes,
            'categories' => $categories,
            'somme' => $service->count()

        ]);
    }

    /**
     * @Route("/admin/recette/creation", name="admin_recette_creation")
     * @Route("/admin/recette/{id}", name="admin_recette_modification", methods="GET|POST")
     */
    public function ajoutModification(Recette $recette = null, Request $request, PanierService $service): Response
    {
        if (!$recette){
            $recette = new Recette();
        }
        
        $manager = $this->getDoctrine()->getManager();
        $form = $this->createForm(RecetteType::class, $recette);
        $form ->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $manager-> persist($recette);
            $manager-> flush();
            $this->addFlash('success', 'Le produit a été modifié!');
            return $this->redirectToRoute("admin_recette", [
                'items' => $service->getFullCart(),
                'somme' => $service->count()
            ]);
        }
        return $this->render('admin/ajoutModifRecette.html.twig', [
            'recette' => $recette,
            'form'=> $form->createView(),
            'isModification' => $recette->getId() != null,
            'items' => $service->getFullCart(),
            'somme' => $service->count()
        ]);
    }

    /**
     * @Route("/admin/{id}", name="admin_voir")
     */
    public function voir(Recette $recette, PanierService $service): Response
    {
        return $this->render('admin/voirRecette.html.twig', [
            'recette' => $recette,
            'items' => $service->getFullCart(),
            'somme' => $service->count()
        ]);
    }

    /**
     * @Route("/admin/recette/{id}", name="admin_recette_suppression", methods="delete")
     */
    public function suppression(Recette $recette = null, Request $request, PanierService $service): Response
    {
        if ($this->isCsrfTokenValid("SUP".$recette->getId(), $request->get('_token'))){
            $manager = $this->getDoctrine()->getManager();
            $manager->remove($recette);
            $manager->flush();
            $this->addFlash('success', 'Le produit a été supprimé!');
            return $this->redirectToRoute("admin_recette", [
                'items' => $service->getFullCart(),
                'somme' => $service->count()
            ]);
        }


    }


}
