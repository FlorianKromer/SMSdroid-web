<?php

namespace SMS\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fixture
 *
 * @ORM\Table(name="fixture")
 * @ORM\Entity
 */
class Fixture
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
    *
    * @ORM\ManyToOne(targetEntity="SMS\MainBundle\Entity\Team")
    * @ORM\JoinColumn(nullable=false)
    */
    private $teamA;

    /**
    *
    * @ORM\ManyToOne(targetEntity="SMS\MainBundle\Entity\Team")
    * @ORM\JoinColumn(nullable=false)
    */
    private $teamB;

    /**
     * @var integer
     *
     * @ORM\Column(name="scoreA", type="integer")
     */
    private $scoreA;

    /**
     * @var integer
     *
     * @ORM\Column(name="scoreB", type="integer")
     */
    private $scoreB;

    /**
     * @var \Days
     *
     * @ORM\ManyToOne(targetEntity="Days",cascade={"persist"},inversedBy="fixtures")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fixture_id", referencedColumnName="id")
     * })
     */
    protected $day;




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
     * @return Fixture
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
     * Set scoreA
     *
     * @param integer $scoreA
     * @return Fixture
     */
    public function setScoreA($scoreA)
    {
        $this->scoreA = $scoreA;

        return $this;
    }

    /**
     * Get scoreA
     *
     * @return integer 
     */
    public function getScoreA()
    {
        return $this->scoreA;
    }

    /**
     * Set scoreB
     *
     * @param integer $scoreB
     * @return Fixture
     */
    public function setScoreB($scoreB)
    {
        $this->scoreB = $scoreB;

        return $this;
    }

    /**
     * Get scoreB
     *
     * @return integer 
     */
    public function getScoreB()
    {
        return $this->scoreB;
    }

    /**
     * Set teamA
     *
     * @param \SMS\MainBundle\Entity\Team $teamA
     * @return Fixture
     */
    public function setTeamA(\SMS\MainBundle\Entity\Team $teamA)
    {
        $this->teamA = $teamA;

        return $this;
    }

    /**
     * Get teamA
     *
     * @return \SMS\MainBundle\Entity\Team 
     */
    public function getTeamA()
    {
        return $this->teamA;
    }

    /**
     * Set teamB
     *
     * @param \SMS\MainBundle\Entity\Team $teamB
     * @return Fixture
     */
    public function setTeamB(\SMS\MainBundle\Entity\Team $teamB)
    {
        $this->teamB = $teamB;

        return $this;
    }

    /**
     * Get teamB
     *
     * @return \SMS\MainBundle\Entity\Team 
     */
    public function getTeamB()
    {
        return $this->teamB;
    }

    /**
     * Set day
     *
     * @param \SMS\MainBundle\Entity\Days $day
     * @return Fixture
     */
    public function setDay(\SMS\MainBundle\Entity\Days $day = null)
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Get day
     *
     * @return \SMS\MainBundle\Entity\Days 
     */
    public function getDay()
    {
        return $this->day;
    }
}
