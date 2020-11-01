<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Recette;
use App\Repository\RecetteRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategorieFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {

        /*
        $categorie = new Categorie();
        $categorie->setName("Menu")
            ->setImage("menu.jpg");
        $manager->persist($categorie);

      $categorie1 = new Categorie();
      $categorie1->setName("Pizza")
          ->setImage("pizza.jpg");
      $manager->persist($categorie1);

        $categorie2 = new Categorie();
        $categorie2->setName("salade")
            ->setImage("salade.jpg");
        $manager->persist($categorie2);

        $categorie3 = new Categorie();
        $categorie3->setName("Dessert")
            ->setImage("dessert.jpg");
        $manager->persist($categorie3);

        $categorie4 = new Categorie();
        $categorie4->setName("Boisson")
            ->setImage("boisson.jpg");
        $manager->persist($categorie4);

        $recetteRepository = $manager->getRepository(Recette::class);

        $recette1 = $recetteRepository->findOneBy(["nom" =>"Atomica"]);
        $recette1->setCategorie($categorie1);
        $recette2 = $recetteRepository->findOneBy(["nom" =>"Norvegese"]);
        $recette2->setCategorie($categorie1);
        $recette3 = $recetteRepository->findOneBy(["nom" =>"Salmone"]);
        $recette3->setCategorie($categorie1);
        $recette4 = $recetteRepository->findOneBy(["nom" =>"Calzone fermée"]);
        $recette4->setCategorie($categorie1);
        $recette5 = $recetteRepository->findOneBy(["nom" =>"Végétariano"]);
        $recette5->setCategorie($categorie1);
        $recette6 = $recetteRepository->findOneBy(["nom" =>"Tré Formagio"]);
        $recette6->setCategorie($categorie1);
        $recette7 = $recetteRepository->findOneBy(["nom" =>"Diabolik"]);
        $recette7->setCategorie($categorie1);
        $recette8 = $recetteRepository->findOneBy(["nom" =>"Orientale"]);
        $recette8->setCategorie($categorie1);
        $recette9 = $recetteRepository->findOneBy(["nom" =>"Berbère"]);
        $recette9->setCategorie($categorie1);
        $recette10 = $recetteRepository->findOneBy(["nom" =>"Prosciutto"]);
        $recette10->setCategorie($categorie1);
        $recette11 = $recetteRepository->findOneBy(["nom" =>"Prosciutto Funghi"]);
        $recette11->setCategorie($categorie1);
        $recette12 = $recetteRepository->findOneBy(["nom" =>"Gigante"]);
        $recette12->setCategorie($categorie1);
        $recette13 = $recetteRepository->findOneBy(["nom" =>"Campagnolo"]);
        $recette13->setCategorie($categorie1);




        $categorie2 = new Categorie();
        $categorie2->setName("salade")
            ->setImage("salade.jpg");
        $manager->persist($categorie2);

        $recetteRepository = $manager->getRepository(Recette::class);

        $recette1 = $recetteRepository->findOneBy(["nom" =>"Terreno"]);
        $recette1->setCategorie($categorie2);

        $recette2 = $recetteRepository->findOneBy(["nom" =>"Neptune"]);
        $recette2->setCategorie($categorie2);

        $recette3 = $recetteRepository->findOneBy(["nom" =>"Pollaïo"]);
        $recette3->setCategorie($categorie2);

        $recette4 = $recetteRepository->findOneBy(["nom" =>"Peisane"]);
        $recette4->setCategorie($categorie2);

        $recette5 = $recetteRepository->findOneBy(["nom" =>"Riviera"]);
        $recette5->setCategorie($categorie2);

        $recette6 = $recetteRepository->findOneBy(["nom" =>"Andréa"]);
        $recette6->setCategorie($categorie2);

        $recette7 = $recetteRepository->findOneBy(["nom" =>"Fresca"]);
        $recette7->setCategorie($categorie2);

        $recette8 = $recetteRepository->findOneBy(["nom" =>"Provolone"]);
        $recette8->setCategorie($categorie2);

        $recette10 = $recetteRepository->findOneBy(["nom" =>"Mozza"]);
        $recette10->setCategorie($categorie2);

        $recette10 = $recetteRepository->findOneBy(["nom" =>"Assiette Frédérico"]);
        $recette10->setCategorie($categorie2);

        $recette10 = $recetteRepository->findOneBy(["nom" =>"Assiette Adriano"]);
        $recette10->setCategorie($categorie2);

        */
        $manager->flush();

    }
}
