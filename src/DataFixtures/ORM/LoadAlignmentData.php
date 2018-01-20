<?php

namespace App\DataFixtures\ORM;

use App\Entity\Alignment;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadAlignmentData implements FixtureInterface, ContainerAwareInterface
{
    private $container;

    public function load(ObjectManager $manager)
    {
        $alignment = new Alignment();
        $alignment->setAlignment("Neutral");

        $manager->persist($alignment);
        $manager->flush();

        $alignment = new Alignment();
        $alignment->setAlignment("Neutral Evil");

        $manager->persist($alignment);
        $manager->flush();
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}
