<?php

namespace AppBundle\Tests\Unit\Model;

use AppBundle\Model\EmailAddress;
use PHPUnit_Framework_TestCase;

class EmailAddressTest extends PHPUnit_Framework_TestCase
{

    /**
     * @return array
     */
    public function validEmailAddressDataProvider()
    {
        return [
            ['dave@example.com', 'dave@example.com'],
            ['dave@EXAMPLE.com', 'dave@example.com'],
        ];
    }


    /**
     * @dataProvider validEmailAddressDataProvider
     *
     * @param string $inputEmailAddress
     * @param string $expectedEmailAddress
     */
    public function testNormaliseEmailAddress($inputEmailAddress, $expectedEmailAddress)
    {
        // We are just constructing an EmailAddress object. If there are no exceptions we know that everything is OK
        $emailAddress = new EmailAddress($inputEmailAddress);
        $this->assertEquals($expectedEmailAddress, $emailAddress->getEmailAddress());
    }


    /**
     * @return array
     */
    public function invalidEmailAddressDataProvider()
    {
        return [
            ['@example.com'],
            ['dave@example'],
            ['dave.example.com'],
        ];
    }


    /**
     * @dataProvider invalidEmailAddressDataProvider
     * @expectedException \Exception
     *
     * @param $inputEmailAddress
     */
    public function testInvalidEmailAddress($inputEmailAddress)
    {
        new EmailAddress($inputEmailAddress);
    }
}
