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
     * Many Characters has One Gender.
     * @ORM\ManyToOne(targetEntity="Gender")
     * @ORM\JoinColumn(name="gender_id", referencedColumnName="id")
     */
    private $gender;

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
     * @ORM\Column(type="integer")
     */
    private $strength;

    /**
     * @ORM\Column(type="integer")
     */
    private $dexterity;

    /**
     * @ORM\Column(type="integer")
     */
    private $constitution;

    /**
     * @ORM\Column(type="integer")
     */
    private $intelligence;

    /**
     * @ORM\Column(type="integer")
     */
    private $wisdom;

    /**
     * @ORM\Column(type="integer")
     */
    private $charisma;

    /**
     * @ORM\Column(type="integer")
     */
    private $hitPoints;


    /**
     * Many GameCharacters have Many Speeches.
     * @ORM\ManyToMany(targetEntity="Speech")
     * @ORM\JoinTable(name="gameCharacters_speeches",
     *      joinColumns={@ORM\JoinColumn(name="game_character_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="speech_id", referencedColumnName="id")}
     *      )
     */

    private $speeches;


    public function __construct()
    {
        $this->speeches = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getSpeeches()
    {
        return $this->speeches;
    }

    /**
     * @return mixed
     */
    public function getUser(): User
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

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * @param mixed $strength
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;
    }

    /**
     * @return mixed
     */
    public function getDexterity()
    {
        return $this->dexterity;
    }

    /**
     * @param mixed $dexterity
     */
    public function setDexterity($dexterity)
    {
        $this->dexterity = $dexterity;
    }

    /**
     * @return mixed
     */
    public function getConstitution()
    {
        return $this->constitution;
    }

    /**
     * @param mixed $constitution
     */
    public function setConstitution($constitution)
    {
        $this->constitution = $constitution;
    }

    /**
     * @return mixed
     */
    public function getIntelligence()
    {
        return $this->intelligence;
    }

    /**
     * @param mixed $intelligence
     */
    public function setIntelligence($intelligence)
    {
        $this->intelligence = $intelligence;
    }

    /**
     * @return mixed
     */
    public function getWisdom()
    {
        return $this->wisdom;
    }

    /**
     * @param mixed $wisdom
     */
    public function setWisdom($wisdom)
    {
        $this->wisdom = $wisdom;
    }

    /**
     * @return mixed
     */
    public function getCharisma()
    {
        return $this->charisma;
    }

    /**
     * @param mixed $charisma
     */
    public function setCharisma($charisma)
    {
        $this->charisma = $charisma;
    }

    /**
     * @return mixed
     */
    public function getHitPoints()
    {
        return $this->hitPoints;
    }

    /**
     * @param mixed $hitPoints
     */
    public function setHitPoints($hitPoints)
    {
        $this->hitPoints = $hitPoints;
    }



}
