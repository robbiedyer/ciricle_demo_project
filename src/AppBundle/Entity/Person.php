<?php

namespace AppBundle\Entity;

use AppBundle\Model\EmailAddress;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

/**
 * @Table(name="people")
 * @Entity()
 */
class Person
{
    /**
     * @var int
     *
     * @Column(name="auth_token_id", type="integer")
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var string
     *
     * @Column(name="email", type="string")
     */
    private $name;

    /**
     * @var string
     *
     * @Column(name="email_address", type="string")
     */
    private $emailAddress;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return EmailAddress
     */
    public function getEmailAddress()
    {
        return new EmailAddress($this->emailAddress);
    }

    /**
     * @param EmailAddress $emailAddress
     */
    public function setEmailAddress(EmailAddress $emailAddress)
    {
        $this->emailAddress = $emailAddress->getEmailAddress();
    }
}
