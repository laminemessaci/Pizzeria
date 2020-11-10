<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\InscriptionType;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminSecurController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function index(Request $request): Response
    {
        $manger = $this->getDoctrine()->getManager();
        $user = new User();
        $form = $this ->createForm(InscriptionType::class, $user);
        $form->handleRequest($request);
        if ( $form->isSubmitted() && $form ->isValid()){
            $manger ->persist($user);
            $manger->flush();
            return $this->redirectToRoute('recettes');
        }
        return $this->render('admin_secur/inscription.html.twig',[
            'form' => $form->createView(),
            'somme' => 5
        ]);
    }
}
