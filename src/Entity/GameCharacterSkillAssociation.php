<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GameCharacterSkillAssociationRepository")
 */
class GameCharacterSkillAssociation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="GameCharacter", inversedBy="gameCharacterSkillAssociations")
     * @ORM\JoinColumn(name="gameCharacter_id", referencedColumnName="id")
     */
    private $gameCharacter;

    /**
     * @ORM\ManyToOne(targetEntity="Skill", inversedBy="gameCharacterSkillAssociations")
     * @ORM\JoinColumn(name="skill_id", referencedColumnName="id")
     */
    private $skill;

    /**
     * @ORM\Column(type="float")
     */
    private $value;

    /**
     * @return mixed
     */
    public function getGameCharacter()
    {
        return $this->gameCharacter;
    }

    /**
     * @param mixed $gameCharacter
     */
    public function setGameCharacter($gameCharacter)
    {
        $this->gameCharacter = $gameCharacter;
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
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }


}
