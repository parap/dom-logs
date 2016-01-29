<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Game;

/**
 * Turn
 *
 * @ORM\Table(name="turn", indexes={@ORM\Index(name="game_id", columns={"game_id"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repo\TurnRepository")
 */
class Turn
{
    /**
     * @var Game $game
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Game", inversedBy="turns")
     * @ORM\JoinColumn(name="game_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private $game;

    /**
     * @var integer
     *
     * @ORM\Column(name="number", type="integer", nullable=false)
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="result", type="text", length=65535, nullable=true)
     */
    private $result;

    /**
     * @var string
     *
     * @ORM\Column(name="idea", type="text", length=65535, nullable=true)
     */
    private $idea;

    /**
     * @var string
     *
     * @ORM\Column(name="plan", type="text", length=65535, nullable=true)
     */
    private $plan;

    /**
     * @var string
     *
     * @ORM\Column(name="action", type="text", length=65535, nullable=true)
     */
    private $action;

    /**
     * @var boolean
     *
     * @ORM\Column(name="privacy", type="integer", nullable=false)
     */
    private $privacy = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


    /**
     * Set game
     *
     * @param integer $game
     *
     * @return Turn
     */
    public function setGame($game)
    {
        $this->game = $game;

        return $this;
    }

    /**
     * Get game
     *
     * @return Game
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * Set number
     *
     * @param integer $number
     *
     * @return Turn
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set result
     *
     * @param string $result
     *
     * @return Turn
     */
    public function setResult($result)
    {
        $this->result = $result;

        return $this;
    }

    /**
     * Get result
     *
     * @return string
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Set idea
     *
     * @param string $idea
     *
     * @return Turn
     */
    public function setIdea($idea)
    {
        $this->idea = $idea;

        return $this;
    }

    /**
     * Get idea
     *
     * @return string
     */
    public function getIdea()
    {
        return $this->idea;
    }

    /**
     * Set plan
     *
     * @param string $plan
     *
     * @return Turn
     */
    public function setPlan($plan)
    {
        $this->plan = $plan;

        return $this;
    }

    /**
     * Get plan
     *
     * @return string
     */
    public function getPlan()
    {
        return $this->plan;
    }

    /**
     * Set action
     *
     * @param string $action
     *
     * @return Turn
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set privacy
     *
     * @param boolean $privacy
     *
     * @return Turn
     */
    public function setPrivacy($privacy)
    {
        $this->privacy = $privacy;

        return $this;
    }

    /**
     * Get privacy
     *
     * @return boolean
     */
    public function getPrivacy()
    {
        return $this->privacy;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}

