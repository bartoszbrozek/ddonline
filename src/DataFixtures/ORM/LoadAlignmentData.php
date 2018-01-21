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
        $alignments = ['Lawful', 'Neutral', 'Chaotic'];

        $types = ['Good', 'Neutral', 'Evil'];

        foreach ($alignments as $alignment) {
            $alg = $alignment;
            foreach ($types as $type) {
                $alignment = new Alignment();
                $alignment->setAlignment((string)$alg . " " . (string)$type);

                $manager->persist($alignment);
                $manager->flush();
            }
        }

    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}
