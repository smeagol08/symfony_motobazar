<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="carcondition")
 */
class CarCondition
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
	 * @ORM\OneToMany(targetEntity="Advertisement", mappedBy="carcondition")
	 */
	protected $advertisements;



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
     * @return CarCondition
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
     * @return CarCondition
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
}
