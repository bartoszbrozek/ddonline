<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AbilityRepository")
 */
class Ability
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=127)
     */
    private $ability;

    /**
     * @return mixed
     */
    public function getAbility()
    {
        return $this->ability;
    }

    /**
     * @param mixed $ability
     */
    public function setAbility($ability)
    {
        $this->ability = $ability;
    }


}
