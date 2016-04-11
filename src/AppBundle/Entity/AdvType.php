<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="advtype")
 */
class AdvType
{ 
	/**
      * @ORM\Id
      * @ORM\Column(type="integer")
      * @ORM\GeneratedValue(strategy="AUTO")
      */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=10)
	 */
	protected $name;
	
	/**
	 * @ORM\OneToMany(targetEntity="Advertisement", mappedBy="type")
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
     *
     * @return Advtype
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
     * Add advertisement
     *
     * @param \AppBundle\Entity\Advertisement $advertisement
     *
     * @return Advtype
     */
    public function addAdvertisement(\AppBundle\Entity\Advertisement $advertisement)
    {
        $this->advertisements[] = $advertisement;

        return $this;
    }

    /**
     * Remove advertisement
     *
     * @param \AppBundle\Entity\Advertisement $advertisement
     */
    public function removeAdvertisement(\AppBundle\Entity\Advertisement $advertisement)
    {
        $this->advertisements->removeElement($advertisement);
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
