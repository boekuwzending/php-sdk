<?php

declare(strict_types=1);

namespace Boekuwzending\Tests;

use Boekuwzending\Client;
use Boekuwzending\ClientFactory;
use PHPUnit\Framework\TestCase;

/**
 * Class ClientFactoryTest.
 */
class ClientFactoryTest extends TestCase
{
    public function testBuild(): void
    {
        // Arrange
        $clientId = 'test_clientId';
        $clientSecret = 'test_clientSecret';

        // Act
        $client = ClientFactory::build($clientId, $clientSecret);

        // Assert
        $this->assertInstanceOf(Client::class, $client);
    }
}
