<?php

namespace App\DataFixtures\ORM;

use App\Entity\Alignment;
use App\Entity\Race;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadRaceData implements FixtureInterface, ContainerAwareInterface
{
    private $container;

    public function load(ObjectManager $manager)
    {
        $race = new Race();
        $race->setRace("Elf");

        $manager->persist($race);
        $manager->flush();

        $race = new Race();
        $race->setRace("Human");

        $manager->persist($race);
        $manager->flush();
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}
