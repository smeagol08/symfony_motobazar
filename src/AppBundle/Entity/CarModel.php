<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="carmodel")
 */
class CarModel
{ 
	/**
      * @ORM\Id
      * @ORM\Column(type="integer")
      * @ORM\GeneratedValue(strategy="AUTO")
      */
	protected $id;
	/**
	 * @ORM\Column(type="string", length=25)
	 */
	protected $name;
	
	/**
	 * @ORM\OneToMany(targetEntity="Advertisement", mappedBy="carmodel")
	 */
	protected $advertisements;

	/**
	 * @ORM\ManyToOne(targetEntity="CarMake", inversedBy="carmodels")
	 * @ORM\JoinColumn(name="carmake_id", referencedColumnName="id")
	 */
	protected $carmake;
	

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->advertisements = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return CarModel
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
     * Add advertisements
     *
     * @param \AppBundle\Entity\Advertisement $advertisements
     * @return CarModel
     */
    public function addAdvertisement(\AppBundle\Entity\Advertisement $advertisements)
    {
        $this->advertisements[] = $advertisements;

        return $this;
    }

    /**
     * Remove advertisements
     *
     * @param \AppBundle\Entity\Advertisement $advertisements
     */
    public function removeAdvertisement(\AppBundle\Entity\Advertisement $advertisements)
    {
        $this->advertisements->removeElement($advertisements);
    }

    /**
     * Get advertisements
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAdvertisements()
    {
        return $this->advertisements;
    }
    public function __toString()
    {
    	return $this->name;
    }

    /**
     * Set carmake
     *
     * @param \AppBundle\Entity\CarMake $carmake
     * @return CarModel
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
