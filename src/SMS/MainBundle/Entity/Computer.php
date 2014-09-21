<?php

namespace SMS\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SMS\MainBundle\Model\Computer as AbstractComputer;
use Application\Sonata\UserBundle\Entity\User as User;

/**
 * Computer
 *
 * @ORM\Table(name="computer")
 * @ORM\Entity
 */
class Computer extends AbstractComputer

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
     * @ORM\Column(name="name", type="string", length=100)
     */
    protected $name;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User",cascade={"persist"},inversedBy="computers")
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
     * Set name
     *
     * @param string $name
     * @return Computer
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
     * Set user
     *
     * @param \Application\Sonata\UserBundle\Entity\User $user
     * @return Computer
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
