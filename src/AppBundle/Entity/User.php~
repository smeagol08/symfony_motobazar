<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;    
    
    /**
     * @ORM\OneToMany(targetEntity="Advertisement", mappedBy="user")
     */
    protected $advertisements;
    
	/**
     * @ORM\OneToMany(targetEntity="Header", mappedBy="userto")
     */
    protected $usertoheaders;
    
    /**
     * @ORM\OneToMany(targetEntity="Header", mappedBy="userfrom")
     */
    protected $userfromheaders;
    

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }




    /**
     * Add advertisements
     *
     * @param \AppBundle\Entity\Advertisement $advertisements
     * @return User
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

    /**
     * Add usertoheaders
     *
     * @param \AppBundle\Entity\Header $usertoheaders
     * @return User
     */
    public function addUsertoheader(\AppBundle\Entity\Header $usertoheaders)
    {
        $this->usertoheaders[] = $usertoheaders;

        return $this;
    }

    /**
     * Remove usertoheaders
     *
     * @param \AppBundle\Entity\Header $usertoheaders
     */
    public function removeUsertoheader(\AppBundle\Entity\Header $usertoheaders)
    {
        $this->usertoheaders->removeElement($usertoheaders);
    }

    /**
     * Get usertoheaders
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsertoheaders()
    {
        return $this->usertoheaders;
    }

    /**
     * Add userfromheaders
     *
     * @param \AppBundle\Entity\Header $userfromheaders
     * @return User
     */
    public function addUserfromheader(\AppBundle\Entity\Header $userfromheaders)
    {
        $this->userfromheaders[] = $userfromheaders;

        return $this;
    }

    /**
     * Remove userfromheaders
     *
     * @param \AppBundle\Entity\Header $userfromheaders
     */
    public function removeUserfromheader(\AppBundle\Entity\Header $userfromheaders)
    {
        $this->userfromheaders->removeElement($userfromheaders);
    }

    /**
     * Get userfromheaders
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUserfromheaders()
    {
        return $this->userfromheaders;
    }
}
