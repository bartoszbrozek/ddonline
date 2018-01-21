<?php

namespace App\DataFixtures\ORM;

use App\Entity\Speech;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadSpeechData implements FixtureInterface, ContainerAwareInterface
{
    private $container;

    public function load(ObjectManager $manager)
    {
        $speeches = [
            'Draconic',
            'Gnoll',
            'Gnome',
            'Goblin',
            'Orc',
            'Sylvan',
            'Common',
            'Elven'
        ];

        foreach ($speeches as $speech) {
            $entity = new Speech();
            $entity->setSpeech($speech);

            $manager->persist($entity);
            $manager->flush();
        }

    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}
