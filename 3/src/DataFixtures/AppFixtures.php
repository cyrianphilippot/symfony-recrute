  
<?php

namespace App\DataFixtures;

use App\Entity\Contrats;
use App\Entity\TypeContrats;
use App\Entity\Offres;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;


/*
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = Factory::create('en_HK');

        for($i = 0 ; $i < 10 ; $i++){

            $offre = new Offres();
            $contrat = new Contrats();
            $contrattype = new ContratType();

            
            $array = ['CDD', 'CDI', 'free'];
            $contrat_array = $faker->randomElements($array);

            $array2 = ['plein', 'partiel'];
            $contrattype_array = $faker->randomElements($array2);


            
            $offre->setTitle($faker->sentence($nbWords = 2, $variableNbWords = true))
                ->setVille($faker->town)
                ->setDescription($faker->sentence($nbWords = 15, $variableNbWords = true))
                ->setAdresse($faker->streetAddress)
                ->setCodePostal($faker->postcode)
                ->setDateCreation($faker->dateTimeBetween($startDate = '-3 months', $endDate = '-14 days'))
                ->setDateMaj($faker->dateTimeBetween($startDate = '-9 days', $endDate = 'now'))
                ->setContrat($contrat_array[0])
                ->setContratType($contrattype_array[0]);


            if ($contrat_array[0] == 'CDI') {
                $contrat->SetCDI(1)
                    ->SetCDD(0)
                    ->Setfree(0);
            }
            else if ($contrat_array[0] == 'CDD') {
                $contrat->SetCDI(0)
                    ->SetCDD(1)
                    ->Setfree(0);
                $offre->setFinMission($faker->dateTimeBetween($startDate = 'now', $endDate = '+6 months'));
            }
            else if ($contrat_array[0] == 'free') {
                $contrat->SetCDI(0)
                    ->SetCDD(0)
                    ->Setfree(1);
                $offre->setFinMission($faker->dateTimeBetween($startDate = 'now', $endDate = '+6 months'));
            }


            if ($contrattype_array[0] == 'plein') {
                $contrattype->setPartiel(0)
                    ->setPlein(1);
            }
            else if ($contrattype_array[0] == 'partiel') {
                $contrattype->setPartiel(1)
                    ->setPlein(0);
            }
            
            $manager->persist($offre);
            $manager->persist($contrat);
            $manager->persist($contrattype);
    }

        $manager->flush();
    }
}
*/

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        $cdd = new Contrats();
        $cdd->setTitre("CDD");
        $manager->persist($cdd);
        $cdi = new Contrats();
        $cdi->setTitre("CDI");
        $manager->persist($cdi);
        $freelance = new Contrats();
        $freelance->setTitre("Freelance");
        $manager->persist($freelance);
        $temps_plein = new TypeContrats();
        $temps_plein->setTitre("Temps Plein");
        $manager->persist($temps_plein);
        $temps_partiel = new TypeContrats();
        $temps_partiel->setTitre("Temps Partiel");
        $manager->persist($temps_partiel);

        for ($i = 0; $i < 20; $i++) {
            $contrat = $faker->randomElement(array($cdd, $cdi, $freelance));
            $type_contrat = $faker->randomElement(array($temps_plein, $temps_partiel));
            $offres = new Offres();
            $offres->setTitle($faker->sentence(2, true))
                ->setDescription($faker->sentence(10, true))
                ->setAdresse($faker->sentence(10, true))
                ->setCodePostal($faker->postcode())
                ->setVille($faker->city())
                ->setDateCreation($faker->dateTimeBetween('-6 months', '-3 months'))
                ->setDateMaj($faker->dateTimeBetween('-2 months', 'now'))
                ->setKeyContrats($contrat)
                ->setKeyTypeContrats($type_contrat);
            if ($contrat->getTitre() == "CDD" or $contrat->getTitre() == "Freelance") {
                $offres->setFinMission($faker->dateTimeBetween('+1 months', '+2 months'));
            } else {
                $offres->setFinMission(Null);
            }

            $manager->persist($offres);
        }

        $manager->flush();
    }
}
