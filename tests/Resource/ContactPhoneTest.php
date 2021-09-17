<?php

declare(strict_types=1);

namespace Boekuwzending\Tests\Resource;

use Boekuwzending\Resource\OrderContact;
use PHPUnit\Framework\TestCase;

/**
 * Class AddressTest.
 */
class ContactPhoneTest extends TestCase
{
    public function testValidNumberGetsParsed(): void
    {
        // Arrange
        $contact = new OrderContact();
        $validNumber = '+31172470000';

        // Act
        $contact->setPhoneNumber($validNumber);

        // Assert
        $this->assertSame($validNumber, $contact->getPhoneNumber());
    }

    public function testInvalidNumberGetsAssignedToPlain(): void
    {
        // Arrange
        $contact = new OrderContact();
        $invalidNumber = '-700';

        // Act
        $contact->setPhoneNumber($invalidNumber);

        // Assert
        $this->assertNull($contact->getPhoneNumber());
        $this->assertSame($invalidNumber, $contact->getPlainPhoneNumber());
    }
}
