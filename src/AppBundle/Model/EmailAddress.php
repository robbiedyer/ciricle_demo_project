<?php

namespace AppBundle\Model;

use Exception;

/**
 * Represents an email address
 */
class EmailAddress
{

    /**
     * @var string
     */
    private $emailAddress;

    /**
     * EmailAddress constructor.
     * @param string $rawEmailAddress
     * @throws Exception
     */
    public function __construct($rawEmailAddress)
    {
        if (!filter_var($rawEmailAddress, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email address [$rawEmailAddress]");
        }

        $this->emailAddress = strtolower($rawEmailAddress);
    }

    /**
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }
}
