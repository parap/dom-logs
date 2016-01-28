<?php

namespace AppBundle\Entity;

/**
 * Turn
 */
class Turn
{
    /**
     * @var integer
     */
    private $idGame;

    /**
     * @var integer
     */
    private $number;

    /**
     * @var string
     */
    private $result;

    /**
     * @var string
     */
    private $idea;

    /**
     * @var string
     */
    private $plan;

    /**
     * @var string
     */
    private $action;

    /**
     * @var boolean
     */
    private $privacy = '0';

    /**
     * @var integer
     */
    private $id;


    /**
     * Set idGame
     *
     * @param integer $idGame
     *
     * @return Turn
     */
    public function setIdGame($idGame)
    {
        $this->idGame = $idGame;

        return $this;
    }

    /**
     * Get idGame
     *
     * @return integer
     */
    public function getIdGame()
    {
        return $this->idGame;
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

