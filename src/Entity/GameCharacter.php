<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table("game_character")
 * @ORM\Entity(repositoryClass="App\Repository\GameCharacterRepository")
 */
class GameCharacter
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
    private $name;

    /**
     * Many Characters have One CharacterClass.
     * @ORM\ManyToOne(targetEntity="CharacterClass")
     * @ORM\JoinColumn(name="characterClass_id", referencedColumnName="id")
     */
    private $className;

    /**
     * @ORM\Column(type="integer")
     */
    private $level;

    /**
     * Many Characters has One Race.
     * @ORM\ManyToOne(targetEntity="Race")
     * @ORM\JoinColumn(name="race_id", referencedColumnName="id")
     */
    private $race;

    /**
     * Many Characters has One Alignment.
     * @ORM\ManyToOne(targetEntity="Alignment")
     * @ORM\JoinColumn(name="alignment_id", referencedColumnName="id")
     */
    private $alignment;

    /**
     * @ORM\Column(type="integer")
     */
    private $experience;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="gameCharacters")
     * @ORM\JoinColumn(nullable=true)
     */
    private $user;

    /**
     * @return mixed
     */
    public function getUser() : User
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * @param mixed $className
     */
    public function setClassName($className)
    {
        $this->className = $className;
    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param mixed $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @return mixed
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * @param mixed $race
     */
    public function setRace($race)
    {
        $this->race = $race;
    }

    /**
     * @return mixed
     */
    public function getAlignment()
    {
        return $this->alignment;
    }

    /**
     * @param mixed $alignment
     */
    public function setAlignment($alignment)
    {
        $this->alignment = $alignment;
    }

    /**
     * @return mixed
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * @param mixed $experience
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;
    }


}
