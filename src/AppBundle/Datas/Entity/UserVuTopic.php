<?php

namespace AppBundle\Datas\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * UserVuTopic
 *
 * @ORM\Table(name="user_vu_topic")
 * @ORM\Entity(repositoryClass="AppBundle\Service\Repository\UserVuTopicRepository")
 */
class UserVuTopic
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
     * @var User
     * @Assert\NotNull()
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="user_id",referencedColumnName="id",nullable=false)
     */
    private $oUser;
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
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
}

