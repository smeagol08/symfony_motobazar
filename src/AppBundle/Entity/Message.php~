<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="message")
 */
class Message
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	/**
	 * @ORM\Column(type="string", length=5000)
	 */
	protected $content;
	
	/**
	 * @ORM\Column(type="datetime")
	 */
	protected $created;
	/**
	 * @ORM\Column(type="boolean")
	 */
	protected $isfromsender;
	/**
	 * @ORM\Column(type="boolean")
	 */
	protected $isread;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Header", inversedBy="messages")
	 * @ORM\JoinColumn(name="header_id", referencedColumnName="id")
	 */
	protected $header;

  

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
     * Set content
     *
     * @param string $content
     * @return Message
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Message
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
     * Set isfromsender
     *
     * @param boolean $isfromsender
     * @return Message
     */
    public function setIsfromsender($isfromsender)
    {
        $this->isfromsender = $isfromsender;

        return $this;
    }

    /**
     * Get isfromsender
     *
     * @return boolean 
     */
    public function getIsfromsender()
    {
        return $this->isfromsender;
    }

    /**
     * Set isread
     *
     * @param boolean $isread
     * @return Message
     */
    public function setIsread($isread)
    {
        $this->isread = $isread;

        return $this;
    }

    /**
     * Get isread
     *
     * @return boolean 
     */
    public function getIsread()
    {
        return $this->isread;
    }

    /**
     * Set header
     *
     * @param \AppBundle\Entity\Header $header
     * @return Message
     */
    public function setHeader(\AppBundle\Entity\Header $header = null)
    {
        $this->header = $header;

        return $this;
    }

    /**
     * Get header
     *
     * @return \AppBundle\Entity\Header 
     */
    public function getHeader()
    {
        return $this->header;
    }
}
