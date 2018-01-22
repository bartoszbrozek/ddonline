<?php

namespace App\DataFixtures\ORM;

use App\Entity\Ability;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadAbilityData implements FixtureInterface, ContainerAwareInterface
{
    private $container;

    public function load(ObjectManager $manager)
    {
        $data = ['INT', 'STR', 'DEX', 'CHA', 'CON', 'WIS'];

        foreach ($data as $d) {
            $entity = new Ability();
            $entity->setAbility($d);

            $manager->persist($entity);
            $manager->flush();
        }

    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}
