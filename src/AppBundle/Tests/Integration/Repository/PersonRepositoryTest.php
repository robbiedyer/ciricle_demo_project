<?php

namespace AppBundle\Tests\Integration\Repository;

use AppBundle\Entity\Person;
use AppBundle\Model\EmailAddress;
use AppBundle\Repository\PersonRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PersonRepositoryTest extends WebTestCase
{
    const NAME = "Bob";
    const LOWER_CASE_EMAIL_ADDRESS = "bob@example.com";
    const UPPER_CASE_EMAIL_ADDRESS = "BOB@EXAMPLE.COM";


    /**
     * Bit of a silly test. Just need some form of test that talks to the database.
     *
     * Puts data into database via repository and then checks the person can be looked up.
     */
    public function testEmailIsCaseInsensitive()
    {
        $client = self::createClient();

        /** @var PersonRepository $personRepository */
        $personRepository = $client->getContainer()->get("app.repository.person");

        $person = new Person();
        $person->setName(self::NAME);
        $person->setEmailAddress(new EmailAddress(self::LOWER_CASE_EMAIL_ADDRESS));

        // Store person
        $personRepository->persist($person);


        // Lookup person
        $actualPerson = $personRepository->findByEmailAddress(new EmailAddress(self::UPPER_CASE_EMAIL_ADDRESS));
        $this->assertEquals(self::NAME, $actualPerson->getName());
    }
}
