<?php

namespace SMS\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SMS\MainBundle\Model\Phone as AbstractPhone;
use Application\Sonata\UserBundle\Entity\User as User;

/**
 * Phone
 *
 * @ORM\Table(name="phone")
 * @ORM\Entity
 */
class Phone extends AbstractPhone
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="number", type="string", length=100)
     */
    protected $number;


    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User",cascade={"persist"},inversedBy="phones")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id",nullable=true)
     * })
     */
    protected $user;
   

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
     * Set number
     *
     * @param string $number
     * @return Phone
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set user
     *
     * @param \Application\Sonata\UserBundle\Entity\User $user
     * @return Phone
     */
    public function setUser(\Application\Sonata\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Application\Sonata\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
