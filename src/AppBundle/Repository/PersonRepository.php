<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Person;
use AppBundle\Model\EmailAddress;
use Doctrine\ORM\EntityManagerInterface;

class PersonRepository
{

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * PersonRepository constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * Save a Person object
     *
     * @param Person $person
     */
    public function persist(Person $person)
    {
        $this->entityManager->persist($person);
        $this->entityManager->flush();
    }


    /**
     * Returns the person with the given email address
     *
     * @param EmailAddress $emailAddress
     * @return Person|null
     */
    public function findByEmailAddress(EmailAddress $emailAddress)
    {
        $repository = $this->entityManager->getRepository(Person::class);
        return $repository->findOneBy(['emailAddress' => $emailAddress->getEmailAddress()]);
    }
}
