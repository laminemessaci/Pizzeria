<?php

namespace App\Controller\Admin;

use App\Entity\Recette;
use App\Form\RecetteType;
use App\Repository\CategorieRepository;
use App\Repository\RecetteRepository;
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
    public function index(RecetteRepository $repository, CategorieRepository $categorieRepository): Response
    {

        $recettes = $repository->findAll();
        $categories = $categorieRepository->findAll();
        return $this->render('admin/adminRecette.html.twig', [
            'recettes' => $recettes,
            'categories' => $categories

        ]);
    }

    /**
     * @Route("/admin/recette/{id}", name="admin_recette_modification")
     */
    public function modification(Recette $recette, Request $request): Response
    {
        $manager = $this->getDoctrine()->getManager();
        $form = $this->createForm(RecetteType::class, $recette);
        $form ->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $manager-> persist($recette);
            $manager-> flush();
            return $this->redirectToRoute("admin_recette");
        }
        return $this->render('admin/modificationRecette.html.twig', [
            'recette' => $recette,
            'form'=> $form->createView()
        ]);
    }

    /**
     * @Route("/admin/{id}", name="admin_voir")
     */
    public function voir(Recette $recette): Response
    {
        return $this->render('admin/voirRecette.html.twig', [
            'recette' => $recette
        ]);
    }
}
