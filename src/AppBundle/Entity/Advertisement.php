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
	 * @ORM\Column(type="integer")
	 */
	protected $yearofprod;
	
	/**
	 * @ORM\Column(type="integer")
	 */
	protected $horsepower;
	
	/**
	 * @ORM\Column(type="integer")
	 */
	protected $mileage;
	
	/**
	 * @ORM\Column(type="integer")
	 */
	protected $enginecapacity;
	
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
	 * @ORM\ManyToOne(targetEntity="Body", inversedBy="advertisements")
	 * @ORM\JoinColumn(name="body_id", referencedColumnName="id")
	 */
	protected $body;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Fuel", inversedBy="advertisements")
	 * @ORM\JoinColumn(name="fuel_id", referencedColumnName="id")
	 */
	protected $fuel;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Color", inversedBy="advertisements")
	 * @ORM\JoinColumn(name="color_id", referencedColumnName="id")
	 */
	protected $color;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Gearbox", inversedBy="advertisements")
	 * @ORM\JoinColumn(name="gearbox_id", referencedColumnName="id")
	 */
	protected $gearbox;
	
	/**
	 * @ORM\ManyToOne(targetEntity="CarModel", inversedBy="advertisements")
	 * @ORM\JoinColumn(name="carmodel_id", referencedColumnName="id")
	 */
	protected $carmodel;
	
	/**
	 * @ORM\ManyToOne(targetEntity="CarMake", inversedBy="advertisements")
	 * @ORM\JoinColumn(name="carmake_id", referencedColumnName="id")
	 */
	protected $carmake;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Province", inversedBy="advertisements")
	 * @ORM\JoinColumn(name="province_id", referencedColumnName="id")
	 */
	protected $province;
	
	/**
	 * @ORM\ManyToOne(targetEntity="CarCondition", inversedBy="advertisements")
	 * @ORM\JoinColumn(name="carcondition_id", referencedColumnName="id")
	 */
	protected $carcondition;
	
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
	 * @param Collection $photos
	 * return $this
	 */
    public function setPhotos(Collection $photos)
    {
    	$this->photos= $photos;
    	return $this;
    }



    /**
     * Add photo
     *
     * @param \AppBundle\Entity\Photo $photo
     *
     * @return Advertisement
     */
    public function addPhoto(\AppBundle\Entity\Photo $photo)
    {
        if(! $this->photos->contains( $photo)){
        	$photo->setAdvertisement($this);
        	$this->photos->add($photo);
        }
        return $this->photos;
    }

    /**
     * Remove photo
     *
     * @param \AppBundle\Entity\Photo $photo
     */
    public function removePhoto(\AppBundle\Entity\Photo $photo)
    {
        if( $this->photos->contains($photo)){
        		$this->photos->removeElement($photo);
        }
        return $this->photos;
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

    /**
     * Set carcondition
     *
     * @param \AppBundle\Entity\CarCondition $condition
     * @return Advertisement
     */
    public function setCarcondition(\AppBundle\Entity\CarCondition $carcondition = null)
    {
        $this->carcondition = $carcondition;

        return $this;
    }

    /**
     * Get carcondition
     *
     * @return \AppBundle\Entity\CarCondition
     */
    public function getCarcondition()
    {
        return $this->carcondition;
    }
    
    

    /**
     * Set yearofprod
     *
     * @param integer $yearofprod
     * @return Advertisement
     */
    public function setYearofprod($yearofprod)
    {
        $this->yearofprod = $yearofprod;

        return $this;
    }

    /**
     * Get yearofprod
     *
     * @return integer 
     */
    public function getYearofprod()
    {
        return $this->yearofprod;
    }

    /**
     * Set horsepower
     *
     * @param integer $horsepower
     * @return Advertisement
     */
    public function setHorsepower($horsepower)
    {
        $this->horsepower = $horsepower;

        return $this;
    }

    /**
     * Get horsepower
     *
     * @return integer 
     */
    public function getHorsepower()
    {
        return $this->horsepower;
    }

    /**
     * Set mileage
     *
     * @param integer $mileage
     * @return Advertisement
     */
    public function setMileage($mileage)
    {
        $this->mileage = $mileage;

        return $this;
    }

    /**
     * Get mileage
     *
     * @return integer 
     */
    public function getMileage()
    {
        return $this->mileage;
    }

    /**
     * Set enginecapacity
     *
     * @param integer $enginecapacity
     * @return Advertisement
     */
    public function setEnginecapacity($enginecapacity)
    {
        $this->enginecapacity = $enginecapacity;

        return $this;
    }

    /**
     * Get enginecapacity
     *
     * @return integer 
     */
    public function getEnginecapacity()
    {
        return $this->enginecapacity;
    }

    /**
     * Set body
     *
     * @param \AppBundle\Entity\Body $body
     * @return Advertisement
     */
    public function setBody(\AppBundle\Entity\Body $body = null)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return \AppBundle\Entity\Body 
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set fuel
     *
     * @param \AppBundle\Entity\Fuel $fuel
     * @return Advertisement
     */
    public function setFuel(\AppBundle\Entity\Fuel $fuel = null)
    {
        $this->fuel = $fuel;

        return $this;
    }

    /**
     * Get fuel
     *
     * @return \AppBundle\Entity\Fuel 
     */
    public function getFuel()
    {
        return $this->fuel;
    }

    /**
     * Set color
     *
     * @param \AppBundle\Entity\Color $color
     * @return Advertisement
     */
    public function setColor(\AppBundle\Entity\Color $color = null)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return \AppBundle\Entity\Color 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set gearbox
     *
     * @param \AppBundle\Entity\Gearbox $gearbox
     * @return Advertisement
     */
    public function setGearbox(\AppBundle\Entity\Gearbox $gearbox = null)
    {
        $this->gearbox = $gearbox;

        return $this;
    }

    /**
     * Get gearbox
     *
     * @return \AppBundle\Entity\Gearbox 
     */
    public function getGearbox()
    {
        return $this->gearbox;
    }


    /**
     * Set province
     *
     * @param \AppBundle\Entity\Province $province
     * @return Advertisement
     */
    public function setProvince(\AppBundle\Entity\Province $province = null)
    {
        $this->province = $province;

        return $this;
    }

    /**
     * Get province
     *
     * @return \AppBundle\Entity\Province 
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Set carmodel
     *
     * @param \AppBundle\Entity\CarModel $carmodel
     * @return Advertisement
     */
    public function setCarmodel(\AppBundle\Entity\CarModel $carmodel = null)
    {
        $this->carmodel = $carmodel;

        return $this;
    }

    /**
     * Get carmodel
     *
     * @return \AppBundle\Entity\CarModel 
     */
    public function getCarmodel()
    {
        return $this->carmodel;
    }

    /**
     * Set carmake
     *
     * @param \AppBundle\Entity\CarMake $carmake
     * @return Advertisement
     */
    public function setCarmake(\AppBundle\Entity\CarMake $carmake = null)
    {
        $this->carmake = $carmake;

        return $this;
    }

    /**
     * Get carmake
     *
     * @return \AppBundle\Entity\CarMake 
     */
    public function getCarmake()
    {
        return $this->carmake;
    }
}
