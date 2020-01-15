<?php

declare(strict_types=1);

namespace Boekuwzending\Tests\Resource;

use Boekuwzending\Exception\InvalidResourceArgumentException;
use Boekuwzending\Resource\Address;
use Boekuwzending\Tests\FakerTrait;
use PHPUnit\Framework\TestCase;

/**
 * Class AddressTest.
 */
class AddressTest extends TestCase
{
    use FakerTrait;

    public function testInstantiateMinimalSucceeds(): void
    {
        // Arrange
        $postcode = $this->getFaker()->postcode;
        $city = $this->getFaker()->city;
        $countryCode = $this->getFaker()->countryCode;
        $privateAddress = $this->getFaker()->boolean;

        // Act
        $address = new Address(
            $postcode,
            $city,
            $countryCode,
            $privateAddress
        );

        // Assert
        $this->assertSame($postcode, $address->getPostcode());
        $this->assertSame($city, $address->getCity());
        $this->assertSame($countryCode, $address->getCountryCode());
        $this->assertSame($privateAddress, $address->isPrivateAddress());
    }

    public function testValidationFails()
    {
        // Arrange
        $postcode = 'This postcode is more than 12 characters and throws exception.';
        $city = $this->getFaker()->city;
        $countryCode = $this->getFaker()->countryCode;
        $privateAddress = $this->getFaker()->boolean;

        $this->expectException(InvalidResourceArgumentException::class);
        $this->expectExceptionMessage('Address postcode must be 12 characters or shorter.');

        // Act
        $address = new Address(
            $postcode,
            $city,
            $countryCode,
            $privateAddress
        );
    }
}
