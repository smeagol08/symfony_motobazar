<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="header")
 */
class Header
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	/**
	 * @ORM\Column(type="string", length=150)
	 */
	protected $title;

	/**
	 * @ORM\Column(type="datetime")
	 */
	protected $created;

	/**
	 * @ORM\ManyToOne(targetEntity="Advertisement", inversedBy="headers")
	 * @ORM\JoinColumn(name="advertisement_id", referencedColumnName="id")
	 */
	protected $advertisement;
	/**
	 * @ORM\ManyToOne(targetEntity="User", inversedBy="userfromheaders")
	 * @ORM\JoinColumn(name="userfrom_id", referencedColumnName="id")
	 */
	protected $userfrom;
	/**
	 * @ORM\ManyToOne(targetEntity="User", inversedBy="usertoheaders")
	 * @ORM\JoinColumn(name="userto_id", referencedColumnName="id")
	 */
	protected $userto;
	
	/**
	 * @ORM\OneToMany(targetEntity="Message", mappedBy="header", cascade={"persist", "remove"})
	 */
	protected $messages;

   

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->messages = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Header
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
     * Set created
     *
     * @param \DateTime $created
     * @return Header
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
     * Set advertisement
     *
     * @param \AppBundle\Entity\Advertisement $advertisement
     * @return Header
     */
    public function setAdvertisement(\AppBundle\Entity\Advertisement $advertisement = null)
    {
        $this->advertisement = $advertisement;

        return $this;
    }

    /**
     * Get advertisement
     *
     * @return \AppBundle\Entity\Advertisement 
     */
    public function getAdvertisement()
    {
        return $this->advertisement;
    }

    /**
     * Set userfrom
     *
     * @param \AppBundle\Entity\User $userfrom
     * @return Header
     */
    public function setUserfrom(\AppBundle\Entity\User $userfrom = null)
    {
        $this->userfrom = $userfrom;

        return $this;
    }

    /**
     * Get userfrom
     *
     * @return \AppBundle\Entity\User 
     */
    public function getUserfrom()
    {
        return $this->userfrom;
    }

    /**
     * Set userto
     *
     * @param \AppBundle\Entity\User $userto
     * @return Header
     */
    public function setUserto(\AppBundle\Entity\User $userto = null)
    {
        $this->userto = $userto;

        return $this;
    }

    /**
     * Get userto
     *
     * @return \AppBundle\Entity\User 
     */
    public function getUserto()
    {
        return $this->userto;
    }

    /**
     * Add messages
     *
     * @param \AppBundle\Entity\Message $messages
     * @return Header
     */
    public function addMessage(\AppBundle\Entity\Message $messages)
    {
        $this->messages[] = $messages;

        return $this;
    }

    /**
     * Remove messages
     *
     * @param \AppBundle\Entity\Message $messages
     */
    public function removeMessage(\AppBundle\Entity\Message $messages)
    {
        $this->messages->removeElement($messages);
    }

    /**
     * Get messages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMessages()
    {
        return $this->messages;
    }
}
