<?php

namespace SMS\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * League
 *
 * @ORM\Table(name="league")
 * @ORM\Entity
 */
class League
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \Players[]
     * @ORM\OneToMany(targetEntity="Team", mappedBy="league")
     */
    protected $teams;


    /**
     * @var string
     *
     * @ORM\Column(name="saison", type="string", length=255)
     */
    private $saison;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->teams = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set saison
     *
     * @param string $saison
     * @return League
     */
    public function setSaison($saison)
    {
        $this->saison = $saison;

        return $this;
    }

    /**
     * Get saison
     *
     * @return string 
     */
    public function getSaison()
    {
        return $this->saison;
    }

    /**
     * Add teams
     *
     * @param \SMS\MainBundle\Entity\Team $teams
     * @return League
     */
    public function addTeam(\SMS\MainBundle\Entity\Team $teams)
    {
        $this->teams[] = $teams;

        return $this;
    }

    /**
     * Remove teams
     *
     * @param \SMS\MainBundle\Entity\Team $teams
     */
    public function removeTeam(\SMS\MainBundle\Entity\Team $teams)
    {
        $this->teams->removeElement($teams);
    }

    /**
     * Get teams
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTeams()
    {
        return $this->teams;
    }
}
