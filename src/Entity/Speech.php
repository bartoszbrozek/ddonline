<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SpeechRepository")
 */
class Speech
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
    private $speech;

    /**
     * GameCharacters ArrayCollection
     */
    private $gameCharacters;

    public function __construct()
    {
        $this->gameCharacters = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getSpeech()
    {
        return $this->speech;
    }

    /**
     * @param mixed $speech
     */
    public function setSpeech($speech)
    {
        $this->speech = $speech;
    }

    /**
     * @return mixed
     */
    public function getGameCharacters()
    {
        return $this->gameCharacters;
    }


    public function __toString()
    {
        return $this->speech;
    }

}
