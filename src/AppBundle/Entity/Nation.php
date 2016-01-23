<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nation
 *
 * @ORM\Table(name="nation", indexes={@ORM\Index(name="id_age", columns={"id_age"})})
 * @ORM\Entity
 */
class Nation
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=32, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_age", type="integer", nullable=false)
     */
    private $idAge;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set name
     *
     * @param string $name
     *
     * @return Nation
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set idAge
     *
     * @param integer $idAge
     *
     * @return Nation
     */
    public function setIdAge($idAge)
    {
        $this->idAge = $idAge;

        return $this;
    }

    /**
     * Get idAge
     *
     * @return integer
     */
    public function getIdAge()
    {
        return $this->idAge;
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
