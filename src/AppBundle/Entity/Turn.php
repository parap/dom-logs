<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Game;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Turn
 *
 * @ORM\Table(name="turn", indexes={@ORM\Index(name="game_id", columns={"game_id"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repo\TurnRepository")
 * @Vich\Uploadable
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
     * @var string
     *
     * @ORM\Column(name="sharelink", type="string", nullable=true)
     */
    private $shareLink;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="turn_out", fileNameProperty="turnOutName")
     *
     * @var File
     */
    private $turnOutFile;

    /**
     * @ORM\Column(name="file_out", type="string", length=255)
     *
     * @var string
     */
    private $turnOutName;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="turn_in", fileNameProperty="turnInName")
     *
     * @var File
     */
    private $turnInFile;

    /**
     * @ORM\Column(name="file_in", type="string", length=255)
     *
     * @var string
     */
    private $turnInName;

    /**
     * @ORM\Column(name="updated_at", type="datetime")
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * Set game
     *
     * @param Game $game
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
     * Set sharelink
     *
     * @param string $shareLink
     *
     * @return Turn
     */
    public function setShareLink($shareLink)
    {
        $this->shareLink = $shareLink;

        return $this;
    }

    public function generateShareLink()
    {
        $this->shareLink = md5(microtime(true) . date('MYdis'));
    }

    /**
     * Get privacy
     *
     * @return string
     */
    public function getShareLink()
    {
        return $this->shareLink;
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

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $turnOut
     *
     * @return Turn
     */
    public function setTurnOutFile(File $turnOut = null)
    {
// TODO: move validation out of entity
        if ($turnOut->getMimeType() !== 'application/octet-stream') {
            return $this;
        }

        if ($turnOut->getSize() > 1024 * 1024 * 10) {
            return $this;
        }

        $this->turnOutFile = $turnOut;

        if ($turnOut) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    /**
     * @return File
     */
    public function getTurnOutFile()
    {
        return $this->turnOutFile;
    }

    /**
     * @param string $turnOutName
     *
     * @return Turn
     */
    public function setTurnOutName($turnOutName)
    {
        $this->turnOutName = $turnOutName;

        return $this;
    }

    /**
     * @return string
     */
    public function getTurnOutName()
    {
        return $this->turnOutName;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $turnIn
     *
     * @return Turn
     */
    public function setTurnInFile(File $turnIn = null)
    {
// TODO: move validation out of entity
        if ($turnIn->getMimeType() !== 'application/octet-stream') {
            return $this;
        }

        if ($turnIn->getSize() > 1024 * 1024 * 10) {
            return $this;
        }

        $this->turnInFile = $turnIn;

        if ($turnIn) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    /**
     * @return File
     */
    public function getTurnInFile()
    {
        return $this->turnInFile;
    }

    /**
     * @param string $turnInName
     *
     * @return Turn
     */
    public function setTurnInName($turnInName)
    {
        $this->turnInName = $turnInName;

        return $this;
    }

    /**
     * @return string
     */
    public function getTurnInName()
    {
        return $this->turnInName;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }
}

