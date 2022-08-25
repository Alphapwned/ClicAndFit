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
            $annonces->setPhone($faker->randomNumber(10, true));
            $annonces->setZipcode($faker->randomNumber(5, true));

            $manager->persist($annonces);
        }

        $manager->flush();
    }
}

