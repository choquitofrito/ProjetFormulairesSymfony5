<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Pays;

class PaysFixtures extends Fixture
{
    // load créera et stockera 20 pays dans la BD
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 20; $i++){
            $pays = new Pays ();
            $pays->setNom ("Belgique" . $i);
            $pays->setLienImage ("belgique" . $i . ".jpg");
            
            $manager->persist($pays);
        }
        $manager->flush();
    }
}
