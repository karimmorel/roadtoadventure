<?php

namespace TravelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PanoplyLink
 *
 * @ORM\Table(name="panoply_link")
 * @ORM\Entity(repositoryClass="TravelBundle\Repository\PanoplyLinkRepository")
 */
class PanoplyLink
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
     * @var int
     *
     * @ORM\Column(name="stuff", type="integer")
     */
    private $stuff;

    /**
     * @var int
     *
     * @ORM\Column(name="panoply", type="integer")
     */
    private $panoply;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set stuff
     *
     * @param integer $stuff
     *
     * @return PanoplyLink
     */
    public function setStuff($stuff)
    {
        $this->stuff = $stuff;

        return $this;
    }

    /**
     * Get stuff
     *
     * @return int
     */
    public function getStuff()
    {
        return $this->stuff;
    }

    /**
     * Set panoply
     *
     * @param integer $panoply
     *
     * @return PanoplyLink
     */
    public function setPanoply($panoply)
    {
        $this->panoply = $panoply;

        return $this;
    }

    /**
     * Get panoply
     *
     * @return int
     */
    public function getPanoply()
    {
        return $this->panoply;
    }
}

