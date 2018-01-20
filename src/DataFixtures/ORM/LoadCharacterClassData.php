<?php

namespace App\DataFixtures\ORM;

use App\Entity\Alignment;
use App\Entity\CharacterClass;
use App\Entity\Race;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadCharacterClassData implements FixtureInterface, ContainerAwareInterface
{
    private $container;

    public function load(ObjectManager $manager)
    {
        $class = new CharacterClass();
        $class->setClassName("Barbarian");

        $manager->persist($class);
        $manager->flush();

        $class = new CharacterClass();
        $class->setClassName("Bard");

        $manager->persist($class);
        $manager->flush();
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}
