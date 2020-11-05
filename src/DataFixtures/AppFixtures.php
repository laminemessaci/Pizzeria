<?php

namespace App\DataFixtures;

use App\Entity\Recette;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        /*
         $recette1 = new Recette();
         $recette1->setNom("Atomica")
             ->setPrix(10.80)
             ->setImage("pizzas/p1.png")
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
            ->setImage("pizzas/p3.png")
            ->setDescription("Origan, fromage, tomate, jambon");
        $manager->persist($recette9);

        $recette10 = new Recette();
        $recette10->setNom("Prosciutto Funghi")
            ->setPrix(12.20)
            ->setImage("pizzas/p4.png")
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



        $recette = new Recette();
        $recette->setNom("Terreno")
            ->setPrix(11.00)
            ->setImage("saldes/terreno.jpg")
            ->setDescription("Salade, croûton, lardons, gorgonzola, avocat, tomate");
        $manager->persist($recette);

        $recette1 = new Recette();
        $recette1->setNom("Neptune")
            ->setPrix(13.00)
            ->setImage("saldes/neptune.jpg")
            ->setDescription("Salade, avocat, asperges, tomates, saumon fumé");
        $manager->persist($recette1);

        $recette2 = new Recette();
        $recette2->setNom("Pollaïo")
            ->setPrix(11.20)
            ->setImage("saldes/pollaio.jpg")
            ->setDescription("Salade, tomate, mousse de canard, blanc de volaille, noix, croûtons");
        $manager->persist($recette2);

        $recette3 = new Recette();
        $recette3->setNom("Peisane")
            ->setPrix(11.60)
            ->setImage("saldes/peisane.jpg")
            ->setDescription("Salade, thon, riz, avocat, tomate");
        $manager->persist($recette3);

        $recette4 = new Recette();
        $recette4->setNom("Riviera")
            ->setPrix(12.50)
            ->setImage("saldes/riviera.jpg")
            ->setDescription("Salade, thon, riz, avocat, tomate");
        $manager->persist($recette4);

        $recette5 = new Recette();
        $recette5->setNom("Andréa")
            ->setPrix(12.00)
            ->setImage("saldes/andrea.jpg")
            ->setDescription("Salade, crevettes, asperges, tomate");
        $manager->persist($recette5);

        $recette6 = new Recette();
        $recette6->setNom("Fresca")
            ->setPrix(12.50)
            ->setImage("saldes/fresca.jpg")
            ->setDescription("Salade, crevettes, asperges, tomate");
        $manager->persist($recette6);

        $recette6 = new Recette();
        $recette6->setNom("Provolone")
            ->setPrix(11.80)
            ->setImage("saldes/provolone.jpg")
            ->setDescription("Salade, tomate, jambon, provolone, olives");
        $manager->persist($recette6);

        $recette7 = new Recette();
        $recette7->setNom("Sanluri")
            ->setPrix(12.80)
            ->setImage("saldes/sanluri.jpg")
            ->setDescription("Salade, tomate, chou rouge, oeuf dur, fromage, mortadelle, olives");
        $manager->persist($recette6);
        $recette8 = new Recette();
        $recette8->setNom("Mozza")
            ->setPrix(11.80)
            ->setImage("saldes/mozza.jpg")
            ->setDescription("Salade, tomate, mozzarella, câpres, anchois, olives, origan, huile d'olives");
        $manager->persist($recette8);

        $recette9 = new Recette();
        $recette9->setNom("Assiette Frédérico")
            ->setPrix(13.80)
            ->setImage("saldes/frederico.jpg")
            ->setDescription("Salade de gésiers de canard, champignons, tomate, ciboulette");
        $manager->persist($recette9);

        $recette10 = new Recette();
        $recette10->setNom("Assiette Adriano")
            ->setPrix(13.80)
            ->setImage("saldes/adriano.jpg")
            ->setDescription("Salade, lardon cuit, noix, croûtons, tomate");
        $manager->persist($recette10);

        $recette1 = new Recette();
        $recette1->setNom("Menu classic")
            ->setPrix(10.00)
            ->setImage("menus/m1.png")
            ->setDescription("Sandwich: Burger, Salade, Tomate, Cornichon + Frites + Boisson");
        $manager->persist($recette1);

        $recette2 = new Recette();
        $recette2->setNom("Menu Bacon")
            ->setPrix(09.80)
            ->setImage("m2.png")
            ->setDescription("Sandwich: Burger, Fromage, Bacon, Salade, Tomate + Frites + Boisson");
        $manager->persist($recette2);

        $recette3 = new Recette();
        $recette3->setNom("Menu Big")
            ->setPrix(11.00)
            ->setImage("m3.png")
            ->setDescription("Sandwich: Burger, Salade, Tomate, Cornichon + Frites + Boisson");
        $manager->persist($recette3);

        $recette4 = new Recette();
        $recette4->setNom("Menu Chicken")
            ->setPrix(12.00)
            ->setImage("m4.png")
            ->setDescription("Sandwich: Poulet Frit, Tomate, Salade, Mayonnaise + Frites + Boisson");
        $manager->persist($recette4);

        $recette5 = new Recette();
        $recette5->setNom("Menu Fish")
            ->setPrix(11.50)
            ->setImage("m5.png")
            ->setDescription("Sandwich: Poisson, Salade, Mayonnaise, Cornichon + Frites + Boisson");
        $manager->persist($recette5);

        $recette6 = new Recette();
        $recette6->setNom("Menu Double Steak")
            ->setPrix(12.80)
            ->setImage("m6.png")
            ->setDescription("Sandwich: Double Burger, Fromage, Bacon, Salade, Tomate + Frites + Boisson");
        $manager->persist($recette6);



        $recette1 = new Recette();
        $recette1->setNom("Coca-Cola")
            ->setPrix(1.90)
            ->setImage("bo1.png")
            ->setDescription("Au choix: Petit, Moyen ou Grand");
        $manager->persist($recette1);


        $recette2 = new Recette();
        $recette2->setNom("Coca-Cola Light")
            ->setPrix(1.90)
            ->setImage("bo2.png")
            ->setDescription("Au choix: Petit, Moyen ou Grand");
        $manager->persist($recette2);

        $recette3 = new Recette();
        $recette3->setNom("Coca-Cola Zéro")
            ->setPrix(1.90)
            ->setImage("bo3.png")
            ->setDescription("Au choix: Petit, Moyen ou Grand");
        $manager->persist($recette3);

        $recette4 = new Recette();
        $recette4->setNom("Fanta")
            ->setPrix(1.90)
            ->setImage("bo4.png")
            ->setDescription("Au choix: Petit, Moyen ou Grand");
        $manager->persist($recette4);

        $recette5 = new Recette();
        $recette5->setNom("Sprite")
            ->setPrix(1.90)
            ->setImage("bo5.png")
            ->setDescription("Au choix: Petit, Moyen ou Grand");
        $manager->persist($recette5);

        $recette6 = new Recette();
        $recette6->setNom("Nestea")
            ->setPrix(1.90)
            ->setImage("bo6.png")
            ->setDescription("Au choix: Petit, Moyen ou Grand");
        $manager->persist($recette6);


        $recette1 = new Recette();
        $recette1->setNom("Fondant au chocolat")
            ->setPrix(3.90)
            ->setImage("d1.png")
            ->setDescription("Au choix: Chocolat Blanc ou au lait");
        $manager->persist($recette1);

        $recette2 = new Recette();
        $recette2->setNom("Muffin")
            ->setPrix(2.80)
            ->setImage("d2.png")
            ->setDescription("Au choix: Au fruits ou au chocolat");
        $manager->persist($recette2);

        $recette3 = new Recette();
        $recette3->setNom("Beignet")
            ->setPrix(3.90)
            ->setImage("d3.png")
            ->setDescription("Au choix: Au chocolat ou Ã  la vanille");
        $manager->persist($recette3);

        $recette4 = new Recette();
        $recette4->setNom("Milkshake")
            ->setPrix(3.90)
            ->setImage("d4.png")
            ->setDescription("Au choix: Fraise, Vanille ou Chocolat");
        $manager->persist($recette4);

        $recette5 = new Recette();
        $recette5->setNom("Sundae")
            ->setPrix(4.90)
            ->setImage("d5.png")
            ->setDescription("Au choix: Fraise, Caramel ou Chocolat");
        $manager->persist($recette5);



        $recette1 = new Recette();
        $recette1->setNom("Tagliatelles Carbonara")
            ->setPrix(12.50)
            ->setImage("p1.png")
            ->setDescription("lardons crème, œuf, fromage");
        $manager->persist($recette1);

        $recette2 = new Recette();
        $recette2->setNom("Tagliatelles Polo")
            ->setPrix(12.20)
            ->setImage("p1.png")
            ->setDescription("poulet, crème, œuf, fromage");
        $manager->persist($recette2);

        $recette3 = new Recette();
        $recette3->setNom("Tagliatelles Salmone")
            ->setPrix(13.80)
            ->setImage("p1.png")
            ->setDescription("saumon, crème, tomate");
        $manager->persist($recette3);

        $recette4 = new Recette();
        $recette4->setNom("Fusilli Tre Formagio")
            ->setPrix(12.50)
            ->setImage("p1.png")
            ->setDescription("gorgonzola, chèvre, mascarpone");
        $manager->persist($recette4);

        $recette5 = new Recette();
        $recette5->setNom("Tagliérini Norvégese")
            ->setPrix(13.90)
            ->setImage("p1.png")
            ->setDescription("saumon fumé, crème, une pointe de whisky");
        $manager->persist($recette5);

        $recette6 = new Recette();
        $recette6->setNom("Tagliérini Adriatique")
            ->setPrix(14.20)
            ->setImage("p1.png")
            ->setDescription("saumon, sole tropicale, crevettes, tomate, une pointe de pastis");
        $manager->persist($recette6);

        $recette7 = new Recette();
        $recette7->setNom("Parpadelle San Romolo")
            ->setPrix(13.00)
            ->setImage("p1.png")
            ->setDescription("courgettes, ail, basilic, huile d'olive");
        $manager->persist($recette7);

        $recette8 = new Recette();
        $recette8->setNom("Parpadelle al Melanzane ")
            ->setPrix(12.90)
            ->setImage("p1.png")
            ->setDescription("aubergines, huile d'olive, basilic");
        $manager->persist($recette8);

        $recette9 = new Recette();
        $recette9->setNom("Fusilli al arrabiata ")
            ->setPrix(12.30)
            ->setImage("p1.png")
            ->setDescription("tomate, poivrons, ail, piment");
        $manager->persist($recette9);

        $recette10 = new Recette();
        $recette10->setNom("Penne Rigat Gorgonzola")
            ->setPrix(12.50)
            ->setImage("p1.png")
            ->setDescription("crème, gorgonzola");
        $manager->persist($recette10);

        $recette11 = new Recette();
        $recette11->setNom("Penne Rigat Matriciana")
            ->setPrix(12.20)
            ->setImage("p1.png")
            ->setDescription("lardons, champignons, oignons, tomate, olives");
        $manager->persist($recette11);

        $recette12 = new Recette();
        $recette12->setNom("Spaghetti Frutti di Mare ")
            ->setPrix(13.80)
            ->setImage("p1.png")
            ->setDescription("calamars, moules, crevettes, tomate");
        $manager->persist($recette12);

        $recette13 = new Recette();
        $recette13->setNom("Tagliattelles al Capra")
            ->setPrix(13.00)
            ->setImage("p1.png")
            ->setDescription("fromage de chèvre, tomate, huile d'olive, basilic");
        $manager->persist($recette13);

        $recette14 = new Recette();
        $recette14->setNom("Spaghetti Bolognese ")
            ->setPrix(13.00)
            ->setImage("p1.png")
            ->setDescription("sauce bolognaise");
        $manager->persist($recette14);

        $recette15 = new Recette();
        $recette15->setNom("Spaghetti Pomodoro")
            ->setPrix(13.00)
            ->setImage("p1.png")
            ->setDescription("sauce tomate, basilic");
        $manager->persist($recette15);

         */
        $manager->flush();

    }
}
