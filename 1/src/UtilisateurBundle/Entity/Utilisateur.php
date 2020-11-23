<?php


namespace UtilisateurBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="UtilisateurBundle\Repository\UtilisateurRepository")
 * @ORM\Table(name="utilisateur")
 */
class Utilisateur extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();

    }
    /**
     * @var string $fullname
     *
     * @ORM\Column(name="fullname", type="string", length=255, nullable=true)
     */
    private $fullname;



    /**
     * @var string $phone
     *
     * @ORM\Column(name="phone", type="string", length=45, nullable=true)
     */
    private $phone;



    /**
     * @var string
     *
     * @ORM\Column(name="aboutMe", type="text")
     */
    private $aboutMe;



    /**
     * @ORM\OneToOne(targetEntity="PlatformBundle\Entity\Image", cascade={"persist","remove"})
     * @ORM\JoinColumn(name="image_id",referencedColumnName="id")
     */
    private $image;


    /**
     * @ORM\OneToMany(targetEntity="PlatformBundle\Entity\Application", mappedBy="utilisateur")
     */
    private $applications;

    /**
     * Set phone.
     *
     * @param string|null $phone
     *
     * @return Utilisateur
     */
    public function setPhone($phone = null)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone.
     *
     * @return string|null
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set fullname.
     *
     * @param string|null $fullname
     *
     * @return Utilisateur
     */
    public function setFullname($fullname = null)
    {
        $this->fullname = $fullname;

        return $this;
    }

    /**
     * Get fullname.
     *
     * @return string|null
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * Set aboutMe.
     *
     * @param string $aboutMe
     *
     * @return Utilisateur
     */
    public function setAboutMe($aboutMe)
    {
        $this->aboutMe = $aboutMe;

        return $this;
    }

    /**
     * Get aboutMe.
     *
     * @return string
     */
    public function getAboutMe()
    {
        return $this->aboutMe;
    }

    /**
     * Set image.
     *
     * @param \PlatformBundle\Entity\Image|null $image
     *
     * @return Utilisateur
     */
    public function setImage(\PlatformBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image.
     *
     * @return \PlatformBundle\Entity\Image|null
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Add application.
     *
     * @param \PlatformBundle\Entity\Application $application
     *
     * @return Utilisateur
     */
    public function addApplication(\PlatformBundle\Entity\Application $application)
    {
        $this->applications[] = $application;

        return $this;
    }

    /**
     * Remove application.
     *
     * @param \PlatformBundle\Entity\Application $application
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeApplication(\PlatformBundle\Entity\Application $application)
    {
        return $this->applications->removeElement($application);
    }

    /**
     * Get applications.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getApplications()
    {
        return $this->applications;
    }
}
