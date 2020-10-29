<?php

namespace App\DataFixtures;

use App\Entity\Recette;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
         $recette1 = new Recette();
         $recette1->setNom("Atomica")
             ->setPrix(10.80)
             ->setImage("pizzas/atomica.png")
             ->setDescription("tomate, mozza, viandes hachée, olives, origon, ail-persil");
         $manager->persist($recette1);

        $recette2 = new Recette();
        $recette2->setNom("Norvegese")
            ->setPrix(13.00)
            ->setImage("pizzas/norvegese.png")
            ->setDescription("Origan, fromage, tomate, crème, saumon fumé, ail-persil");
        $manager->persist($recette2);

        $recette3 = new Recette();
        $recette3->setNom("Salmone")
            ->setPrix(12.80)
            ->setImage("pizzas/salmone.png")
            ->setDescription("tomate, mozza, crème fraiche, saumon, origon, ail-persil");
        $manager->persist($recette3);

        $recette4 = new Recette();
        $recette4->setNom("Calzone ouverte")
            ->setPrix(11.80)
            ->setImage("pizzas/calzoneO.png")
            ->setDescription("tomate, mozza, champignons, jambon, oeuf, origan");
        $manager->persist($recette3);

        $recette4 = new Recette();
        $recette4->setNom("Calzone fermée")
            ->setPrix(11.80)
            ->setImage("pizzas/calzoneF.png")
            ->setDescription("tomate, mozza, champignons, jambon, oeuf, origan");
        $manager->persist($recette4);

        $recette5 = new Recette();
        $recette5->setNom("Végétariano")
            ->setPrix(11.80)
            ->setImage("pizzas/vegetarienne.png")
            ->setDescription("Origan, fromage, tomate, artichauts, champignons, poivrons, oignons, olives");
        $manager->persist($recette5);

        $recette6 = new Recette();
        $recette6->setNom("Tré Formagio")
            ->setPrix(11.80)
            ->setImage("pizzas/3fromages.png")
            ->setDescription("Origan, tomate, mozzarella, gorgonzola, fromage de chèvre");
        $manager->persist($recette6);

        $recette7 = new Recette();
        $recette7->setNom("Diabolik")
            ->setPrix(11.80)
            ->setImage("pizzas/diabolik.png")
            ->setDescription("Origan, fromage, tomate, chorizo, oignons, oeuf");
        $manager->persist($recette7);

        $recette7 = new Recette();
        $recette7->setNom("Orientale")
            ->setPrix(12.50)
            ->setImage("pizzas/oriental.png")
            ->setDescription("Fromage, tomate, merguez, champignons, oeuf");
        $manager->persist($recette7);

        $recette8 = new Recette();
        $recette8->setNom("Berbère")
            ->setPrix(13.00)
            ->setImage("pizzas/berbere.png")
            ->setDescription("Origan, fromage, tomate, oignons, merguez, chorizo, oeuf");
        $manager->persist($recette8);

        $recette9 = new Recette();
        $recette9->setNom("Prosciutto")
            ->setPrix(11.00)
            ->setImage("pizzas/proscioto.png")
            ->setDescription("Origan, fromage, tomate, jambon");
        $manager->persist($recette9);

        $recette10 = new Recette();
        $recette10->setNom("Prosciutto Funghi")
            ->setPrix(12.20)
            ->setImage("pizzas/prosciotof.png")
            ->setDescription("Origan, fromage, tomate, champignons, jambon");
        $manager->persist($recette10);

        $recette11 = new Recette();
        $recette11->setNom("Gigante")
            ->setPrix(15.20)
            ->setImage("pizzas/gigante.png")
            ->setDescription("Origan, fromage, tomate, jambon, champignons, salami, câpres, olives");
        $manager->persist($recette11);

        $recette12 = new Recette();
        $recette12->setNom("Campagnolo")
            ->setPrix(15.20)
            ->setImage("pizzas/campagnolo.png")
            ->setDescription("Origan, fromage, tomate, lardons, pommes de terre, champignons, crème");
        $manager->persist($recette12);



        $manager->flush();
    }
}
