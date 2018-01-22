<?php

namespace App\DataFixtures\ORM;

use App\Entity\Ability;
use App\Entity\Skill;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadSkillData implements FixtureInterface, ContainerAwareInterface
{
    private $container;

    public function load(ObjectManager $manager)
    {
        $data = ['Appraise', 'Climb', 'Diplomacy'];

        foreach ($data as $d) {
            $entity = new Skill();
            $entity->setSkill($d);
            $entity->setType(0);
            $entity->setAbility(1);

            $manager->persist($entity);
            $manager->flush();
        }

    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}
