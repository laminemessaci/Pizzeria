<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\InscriptionType;
use Doctrine\Persistence\ObjectManager;
use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminSecurController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function index(Request $request, UserPasswordEncoderInterface $encoder): Response
    {
        $manger = $this->getDoctrine()->getManager();
        $user = new User();
        $form = $this ->createForm(InscriptionType::class, $user);
        $form->handleRequest($request);
        if ( $form->isSubmitted() && $form ->isValid()){
            $passwordCrypte = $encoder->encodePassword($user, $user->getPassword());
            $user -> setPassword($passwordCrypte);
            $manger ->persist($user);
            $manger->flush();
            return $this->redirectToRoute('recettes');
        }
        return $this->render('admin_secur/inscription.html.twig',[
            'form' => $form->createView(),
            'somme' => 0
        ]);
    }

    /**
     * @Route ("/login", name="connexion")
     */
    public function login(): Response
    {
       return $this->render('admin_secur/login.html.twig',[
           'somme' => 0
       ]);
    }

    /**
     * @Route ("/deconnexion", name="deconnexion")
     */
    public function logout(): Response
    {

    }
}
