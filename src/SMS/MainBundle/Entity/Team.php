<?php

namespace SMS\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Team
 *
 * @ORM\Table(name="team")
 * @ORM\Entity
 */
class Team
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


    /**
     * @var \Players[]
     * @ORM\OneToMany(targetEntity="Player", mappedBy="team")
     */
    protected $players;


    /**
    * @ORM\ManyToMany(targetEntity="SMS\MainBundle\Entity\Fixture", cascade={"persist"})
    */
    private $fixtures;


    /**
     * @var \League
     *
     * @ORM\ManyToOne(targetEntity="League",cascade={"persist"},inversedBy="teams")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="league_id", referencedColumnName="id")
     * })
     */
    protected $league;


    // Comme la propriété $categories doit être un ArrayCollection, souvenez-vous
    // On doit la définir dans un constructeur :
    public function __construct()
    {
        // Si vous aviez déjà un constructeur, ajoutez juste cette ligne :
        $this->fixtures = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Team
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
     * Add players
     *
     * @param \SMS\MainBundle\Entity\Player $players
     * @return Team
     */
    public function addPlayer(\SMS\MainBundle\Entity\Player $players)
    {
        $this->players[] = $players;

        return $this;
    }

    /**
     * Remove players
     *
     * @param \SMS\MainBundle\Entity\Player $players
     */
    public function removePlayer(\SMS\MainBundle\Entity\Player $players)
    {
        $this->players->removeElement($players);
    }

    /**
     * Get players
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPlayers()
    {
        return $this->players;
    }

    /**
     * Add fixtures
     *
     * @param \SMS\MainBundle\Entity\Fixture $fixtures
     * @return Team
     */
    public function addFixture(\SMS\MainBundle\Entity\Fixture $fixtures)
    {
        $this->fixtures[] = $fixtures;

        return $this;
    }

    /**
     * Remove fixtures
     *
     * @param \SMS\MainBundle\Entity\Fixture $fixtures
     */
    public function removeFixture(\SMS\MainBundle\Entity\Fixture $fixtures)
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

    /**
     * Set league
     *
     * @param \SMS\MainBundle\Entity\League $league
     * @return Team
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
}
