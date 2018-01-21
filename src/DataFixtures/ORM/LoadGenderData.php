<?php

namespace App\DataFixtures\ORM;

use App\Entity\Gender;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadGenderData implements FixtureInterface, ContainerAwareInterface
{
    private $container;

    public function load(ObjectManager $manager)
    {
        $genders = ['Male', 'Female', 'Neuter'];

        foreach ($genders as $g) {
            $gender = new Gender();
            $gender->setGender($g);

            $manager->persist($gender);
            $manager->flush();
        }


    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}
