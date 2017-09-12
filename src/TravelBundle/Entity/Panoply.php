<?php

namespace TravelBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Panoply
 *
 * @ORM\Table(name="panoply")
 * @ORM\Entity(repositoryClass="TravelBundle\Repository\PanoplyRepository")
 */
class Panoply
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * Many Panoplies have Many Stuffs.
     * @ORM\ManyToMany(targetEntity="Stuff")
     * @ORM\JoinTable(name="panoply_stuff",
     *      joinColumns={@ORM\JoinColumn(name="panoply_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="stuff_id", referencedColumnName="id")}
     *      )
     */
    private $stuffs;

    /**
     * Get id
     *
     * @return int
     */

    public function __construct()
    {
        $this->stuffs = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Panoply
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
     * Set description
     *
     * @param string $description
     *
     * @return Panoply
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add stuff
     *
     * @param \TravelBundle\Entity\Stuff $stuff
     *
     * @return Panoply
     */
    public function addStuff(Stuff $stuff)
    {
        $this->stuffs[] = $stuff;

        return $this;
    }

    /**
     * Remove stuff
     *
     * @param \TravelBundle\Entity\Stuff $stuff
     */
    public function removeStuff(Stuff $stuff)
    {
        $this->stuffs->removeElement($stuff);
    }

    /**
     * Get stuffs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStuffs()
    {
        return $this->stuffs;
    }
}
