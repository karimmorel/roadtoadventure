<?php

namespace TravelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stuff
 *
 * @ORM\Table(name="stuff")
 * @ORM\Entity(repositoryClass="TravelBundle\Repository\StuffRepository")
 */
class Stuff
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
     * @var int
     *
     * @ORM\Column(name="priority", type="integer")
     */
    private $priority;

    /**
     * @var int
     *
     * @ORM\Column(name="min_price", type="integer")
     */
    private $minPrice;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255)
     */
    private $link;

    /**
     * @var string
     *
     * @ORM\Column(name="informations", type="text")
     */
    private $informations;

    /**
     * @var bool
     *
     * @ORM\Column(name="buy", type="boolean")
     */
    private $buy;

    /**
     * @var string
     *
     * @ORM\Column(name="worth", type="text")
     */
    private $worth;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;


     /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="stuffs")
     * @ORM\JoinColumn(name="category", referencedColumnName="id")
     */
    private $category;

    public function __construct(){
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }


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
     * Set name
     *
     * @param string $name
     *
     * @return Stuff
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
     * Set priority
     *
     * @param integer $priority
     *
     * @return Stuff
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return int
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set minPrice
     *
     * @param integer $minPrice
     *
     * @return Stuff
     */
    public function setMinPrice($minPrice)
    {
        $this->minPrice = $minPrice;

        return $this;
    }

    /**
     * Get minPrice
     *
     * @return int
     */
    public function getMinPrice()
    {
        return $this->minPrice;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return Stuff
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set link
     *
     * @param string $link
     *
     * @return Stuff
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set informations
     *
     * @param string $informations
     *
     * @return Stuff
     */
    public function setInformations($informations)
    {
        $this->informations = $informations;

        return $this;
    }

    /**
     * Get informations
     *
     * @return string
     */
    public function getInformations()
    {
        return $this->informations;
    }

    /**
     * Set buy
     *
     * @param boolean $buy
     *
     * @return Stuff
     */
    public function setBuy($buy)
    {
        $this->buy = $buy;

        return $this;
    }

    /**
     * Get buy
     *
     * @return bool
     */
    public function getBuy()
    {
        return $this->buy;
    }

    /**
     * Set worth
     *
     * @param string $worth
     *
     * @return Stuff
     */
    public function setWorth($worth)
    {
        $this->worth = $worth;

        return $this;
    }

    /**
     * Get worth
     *
     * @return string
     */
    public function getWorth()
    {
        return $this->worth;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return Stuff
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Stuff
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Stuff
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}

