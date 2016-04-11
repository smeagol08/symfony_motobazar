<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="advertisement")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\AdvertisementRepository")
 */
class Advertisement
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $title;
	
	/**
	 * @ORM\Column(type="string", length=25)
     */
	protected $location;
	
	/**
	 * @ORM\Column(type="decimal", scale=2)
	 */	
	protected $price;
	
	/**
	 * @ORM\Column(type="text")
	 */
	protected $description;
	
	/**
	 * @ORM\Column(type="datetime")
	 */
	protected $created;
	
	/**
	 * @ORM\Column(type="datetime", nullable=true)
	 */
	protected $updated;
	
	/**
	 * @ORM\ManyToOne(targetEntity="AdvCat", inversedBy="advertisements")
	 * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
	 */
	protected $category;
	
	/**
	 * @ORM\ManyToOne(targetEntity="AdvType", inversedBy="advertisements")
	 * @ORM\JoinColumn(name="typ_id", referencedColumnName="id")
	 */
	protected $type;
	
	/**
	 * @ORM\ManyToOne(targetEntity="User", inversedBy="advertisements")
	 * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
	 */
	protected $user;	
	
	/**
	 * @ORM\OneToMany(targetEntity="Header", mappedBy="advertisement")
	 */
	protected $headers;
	
	/**
	 * @ORM\OneToMany(targetEntity="Photo", mappedBy="advertisement", cascade={"persist", "remove"})
	 */
	protected $photos;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->headers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->photos = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set title
     *
     * @param string $title
     * @return Advertisement
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return Advertisement
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return Advertisement
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Advertisement
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
     * Set created
     *
     * @param \DateTime $created
     * @return Advertisement
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Advertisement
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set category
     *
     * @param \AppBundle\Entity\AdvCat $category
     * @return Advertisement
     */
    public function setCategory(\AppBundle\Entity\AdvCat $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\AdvCat 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set type
     *
     * @param \AppBundle\Entity\AdvType $type
     * @return Advertisement
     */
    public function setType(\AppBundle\Entity\AdvType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \AppBundle\Entity\AdvType 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return Advertisement
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add headers
     *
     * @param \AppBundle\Entity\Header $headers
     * @return Advertisement
     */
    public function addHeader(\AppBundle\Entity\Header $headers)
    {
        $this->headers[] = $headers;

        return $this;
    }

    /**
     * Remove headers
     *
     * @param \AppBundle\Entity\Header $headers
     */
    public function removeHeader(\AppBundle\Entity\Header $headers)
    {
        $this->headers->removeElement($headers);
    }

    /**
     * Get headers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Add photos
     *
     * @param \AppBundle\Entity\Photo $photos
     * @return Advertisement
     */
    public function addPhoto(\AppBundle\Entity\Photo $photos)
    {
        $this->photos[] = $photos;

        return $this;
    }

    /**
     * Remove photos
     *
     * @param \AppBundle\Entity\Photo $photos
     */
    public function removePhoto(\AppBundle\Entity\Photo $photos)
    {
        $this->photos->removeElement($photos);
    }

    /**
     * Get photos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPhotos()
    {
        return $this->photos;
    }
}
