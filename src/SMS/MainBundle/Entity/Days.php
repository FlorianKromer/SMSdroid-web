<?php

namespace SMS\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Days
 *
 * @ORM\Table(name="days")
 * @ORM\Entity
 */
class Days
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;


    /**
    * @ORM\ManyToOne(targetEntity="SMS\MainBundle\Entity\League")
    * @ORM\JoinColumn(nullable=true)
    */
    private $league;

    /**
     * @var \Fixtures[]
     * @ORM\OneToMany(targetEntity="Player", mappedBy="day")
     */
    protected $fixtures;
    
    public function __construct()
    {
        // Si vous aviez déjà un constructeur, ajoutez juste cette ligne :
        //$this->fixtures = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set date
     *
     * @param \DateTime $date
     * @return Days
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set league
     *
     * @param \SMS\MainBundle\Entity\League $league
     * @return Days
     */
    public function setLeague(\SMS\MainBundle\Entity\League $league = null)
    {
        $this->league = $league;

        return $this;
    }

    /**
     * Get league
     *
     * @return \SMS\MainBundle\Entity\League 
     */
    public function getLeague()
    {
        return $this->league;
    }

    /**
     * Add fixtures
     *
     * @param \SMS\MainBundle\Entity\Player $fixtures
     * @return Days
     */
    public function addFixture(\SMS\MainBundle\Entity\Player $fixtures)
    {
        $this->fixtures[] = $fixtures;

        return $this;
    }

    /**
     * Remove fixtures
     *
     * @param \SMS\MainBundle\Entity\Player $fixtures
     */
    public function removeFixture(\SMS\MainBundle\Entity\Player $fixtures)
    {
        $this->fixtures->removeElement($fixtures);
    }

    /**
     * Get fixtures
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFixtures()
    {
        return $this->fixtures;
    }
}
