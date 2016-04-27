<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="carmake")
 */
class CarMake
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
	 * @ORM\OneToMany(targetEntity="Advertisement", mappedBy="carmake")
	 */
	protected $advertisements;

	/**
	 * @ORM\OneToMany(targetEntity="CarModel", mappedBy="carmake")
	 */
	protected $carmodels;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->advertisements = new \Doctrine\Common\Collections\ArrayCollection();
        $this->carmodels = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return CarMake
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
     * @return CarMake
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
     * Add carmodels
     *
     * @param \AppBundle\Entity\CarModel $carmodels
     * @return CarMake
     */
    public function addCarmodel(\AppBundle\Entity\CarModel $carmodels)
    {
        $this->carmodels[] = $carmodels;

        return $this;
    }

    /**
     * Remove carmodels
     *
     * @param \AppBundle\Entity\CarModel $carmodels
     */
    public function removeCarmodel(\AppBundle\Entity\CarModel $carmodels)
    {
        $this->carmodels->removeElement($carmodels);
    }

    /**
     * Get carmodels
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCarmodels()
    {
        return $this->carmodels;
    }
}
