<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SkillRepository")
 */
class Skill
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
    private $skill;

    /**
     * Many Skills has One Ability.
     * @ORM\ManyToOne(targetEntity="Ability")
     * @ORM\JoinColumn(name="ability_id", referencedColumnName="id")
     */
    private $ability;

    /**
     * Type cross-class or not
     *
     * @ORM\Column(type="boolean")
     */
    private $type;

    /**
     * CharacterClasses ArrayCollection
     */
    private $characterClasses;

    /**
     * @ORM\OneToMany(targetEntity="GameCharacterSkillAssociation", mappedBy="skill")
     */
    private $gameCharacterSkillAssociations;

    public function __construct()
    {
        $this->characterClasses = new ArrayCollection();
        $this->gameCharacterSkillAssociations = new ArrayCollection();
    }

    public function addGameCharacterSkillAssociation(GameCharacterSkillAssociation $gameCharacterSkillAssociation)
    {
        $this->gameCharacterSkillAssociations = $gameCharacterSkillAssociation;

        return $this;
    }

    public function removeGameCharacterSkillAssociation(GameCharacterSkillAssociation $gameCharacterSkillAssociation)
    {
        $this->gameCharacterSkillAssociations->removeElement($gameCharacterSkillAssociation);
    }

    /**
     * @return mixed
     */
    public function getGameCharacterSkillAssociations()
    {
        return $this->gameCharacterSkillAssociations;
    }

    /**
     * @return mixed
     */
    public function getSkill()
    {
        return $this->skill;
    }

    /**
     * @param mixed $skill
     */
    public function setSkill($skill)
    {
        $this->skill = $skill;
    }

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

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }


}
