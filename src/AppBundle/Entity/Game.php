<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Nation;
use AppBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;

use Doctrine\ORM\Mapping as ORM;

/**
 * Game
 *
 * @ORM\Table(name="game", indexes={@ORM\Index(name="nation_id", columns={"nation_id"}), @ORM\Index(name="user_id", columns={"user_id"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repo\GameRepository")
 */
class Game
{
    /**
     * @var Nation $nation
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Nation", inversedBy="games")
     * @ORM\JoinColumn(name="nation_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private $nation;

    /**
     * @var string
     *
     * @ORM\Column(name="pretender", type="string", length=255, nullable=true)
     */
    private $pretender;

    /**
     * @var string
     *
     * @ORM\Column(name="plan_general", type="text", length=65535, nullable=true)
     */
    private $planGeneral;

    /**
     * @var string
     *
     * @ORM\Column(name="map", type="string", length=256, nullable=true)
     */
    private $map;

    /**
     * @var string
     *
     * @ORM\Column(name="plan_research", type="text", length=65535, nullable=true)
     */
    private $planResearch;

    /**
     * @var string
     *
     * @ORM\Column(name="winner", type="string", length=255, nullable=true)
     */
    private $winner;

    /**
     * @var string
     *
     * @ORM\Column(name="server_link", type="string", length=1024, nullable=true)
     */
    private $serverLink;

    /**
     * @var string
     *
     * @ORM\Column(name="thread", type="string", length=1024, nullable=true)
     */
    private $thread;

    /**
     * @var User $user
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="games")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private $user;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var Turn[]|ArrayCollection $turns
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Turn", mappedBy="game", cascade={"remove"})
     */
    private $turns;

    public function __construct()
    {
        $this->turns = new ArrayCollection();
    }

    /**
     * Set nation
     *
     * @param Nation $nation
     *
     * @return Game
     */
    public function setNation(Nation $nation)
    {
        $this->nation = $nation;

        return $this;
    }

    /**
     * Get nation
     *
     * @return Nation
     */
    public function getNation()
    {
        return $this->nation;
    }

    /**
     * Set pretender
     *
     * @param string $pretender
     *
     * @return Game
     */
    public function setPretender($pretender)
    {
        $this->pretender = $pretender;

        return $this;
    }

    /**
     * Get pretender
     *
     * @return string
     */
    public function getPretender()
    {
        return $this->pretender;
    }

    /**
     * Set planGeneral
     *
     * @param string $planGeneral
     *
     * @return Game
     */
    public function setPlanGeneral($planGeneral)
    {
        $this->planGeneral = $planGeneral;

        return $this;
    }

    /**
     * Get planGeneral
     *
     * @return string
     */
    public function getPlanGeneral()
    {
        return $this->planGeneral;
    }

    /**
     * Set map
     *
     * @param string $map
     *
     * @return Game
     */
    public function setMap($map)
    {
        $this->map = $map;

        return $this;
    }

    /**
     * Get map
     *
     * @return string
     */
    public function getMap()
    {
        return $this->map;
    }

    /**
     * Set planResearch
     *
     * @param string $planResearch
     *
     * @return Game
     */
    public function setPlanResearch($planResearch)
    {
        $this->planResearch = $planResearch;

        return $this;
    }

    /**
     * Get planResearch
     *
     * @return string
     */
    public function getPlanResearch()
    {
        return $this->planResearch;
    }

    /**
     * Set winner
     *
     * @param string $winner
     *
     * @return Game
     */
    public function setWinner($winner)
    {
        $this->winner = $winner;

        return $this;
    }

    /**
     * Get winner
     *
     * @return string
     */
    public function getWinner()
    {
        return $this->winner;
    }

    /**
     * Set serverLink
     *
     * @param string $serverLink
     *
     * @return Game
     */
    public function setServerLink($serverLink)
    {
        $this->serverLink = $serverLink;

        return $this;
    }

    /**
     * Get serverLink
     *
     * @return string
     */
    public function getServerLink()
    {
        return $this->serverLink;
    }

    /**
     * Set thread
     *
     * @param string $thread
     *
     * @return Game
     */
    public function setThread($thread)
    {
        $this->thread = $thread;

        return $this;
    }

    /**
     * Get thread
     *
     * @return string
     */
    public function getThread()
    {
        return $this->thread;
    }

    /**
     * Set user
     *
     * @param User $user
     *
     * @return Game
     */
    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get userId
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    public function belongsTo(User $user)
    {
        return $this->user->getId() === $user->getId();
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

    public function __toString()
    {
        return $this->getNation() . ' ' . $this->getNation()->getAge() . ' Age';
    }

    public function getTurns()
    {
        return $this->turns;
    }

    public function getLastTurnNumber()
    {
        $max = 0;

        foreach ($this->turns as $turn) {
            if ($turn->getNumber() > $max) {
                $max = $turn->getNumber();
            }
        }

        return $max;
    }

    public function getTurnsAvailable($offset = 1)
    {
        $max      = $this->getLastTurnNumber();
        $mask     = range(1, $max + $offset);
        $existing = [];

        foreach ($this->turns as $turn) {
            $existing[$turn->getNumber()] = $turn->getNumber();
        }

        // we want to have the same keys and values to allow array to be flipped
        $result = array_diff($mask, $existing);

        return array_combine(array_values($result), array_values($result));
    }
}
