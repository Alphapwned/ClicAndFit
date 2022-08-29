<?php

namespace App\DataFixtures;

use App\Entity\Annonces;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AnnoncesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 50; $i++) {
            
            $annonces = new Annonces();
            $annonces->setTitle($faker->sentence(4));
            $annonces->setDescription($faker->paragraph(2));
            $annonces->setDate();
            $annonces->setPhone($faker->numberBetween(01, 9999));
            $annonces->setZipcode($faker->numberBetween(01000, 99999));

            $manager->persist($annonces);
        }

        $manager->flush();
    }
}

