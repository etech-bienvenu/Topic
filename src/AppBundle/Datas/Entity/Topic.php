<?php

namespace AppBundle\Datas\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\JoinColumn;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Topic
 *
 * @ORM\Table(name="topic")
 * @ORM\Entity(repositoryClass="AppBundle\Service\Repository\TopicRepository")
 */
class Topic
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(max="50",maxMessage="Votre titre ne doit pas exceder de {{limit}}")
     * @ORM\Column(name="title", type="string", length=50, unique=true)
     */
    private $title;
    
    /**
     * @var User
     * @ManyToOne(targetEntity="User")
     * @Assert\NotNull()
     * @JoinColumn(name="user_id",referencedColumnName="id",nullable=false)
     */
    private $oUser;
    
    /**
     * @var array
     * @OneToMany(targetEntity="UserVuTopic",mappedBy="oTopic",cascade={"persist","remove"})
     */
    private $aUserVuTopics;
    
    /**
     * Topic constructor.
     */
    public function __construct()
    {
        $this->aUserVuTopics = new ArrayCollection();
    }
    
    /**
     * Get id
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Topic
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
     * @return User
     */
    public function getOUser()
    {
        return $this->oUser;
    }
    
    /**
     * @param User $oUser
     */
    public function setOUser(User $oUser)
    {
        $this->oUser = $oUser;
    }
    
    /**
     * @return array
     */
    public function getAUserVuTopics()
    {
        return $this->aUserVuTopics;
    }
    
    /**
     * @param ArrayCollection $aUserVuTopics
     */
    public function setAUserVuTopics(ArrayCollection $aUserVuTopics)
    {
        if (empty($this->aUserVuTopics)) {
            $this->aUserVuTopics = $aUserVuTopics;
        }
        else {
            foreach ($aUserVuTopics as $userVuTopic){
                $this->aUserVuTopics->add($userVuTopic);
            }
        }
    }
    
    /**
     * DESCRIPTION function
     *
     * la declaration de  visisbilité doit être OBLIGATOIRE
     * @param UserVuTopic $userVuTopic
     */
    public function addUserVuTopic(UserVuTopic $userVuTopic)
    {
        $this->aUserVuTopics->add($userVuTopic);
    }
    
}

