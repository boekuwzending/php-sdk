<?php

declare(strict_types=1);

namespace Boekuwzending\Tests\Endpoints;

use Boekuwzending\Client;
use Boekuwzending\Endpoints\MeEndpoint;
use Boekuwzending\Resource\Me;
use Boekuwzending\Serializer\Serializer;
use Boekuwzending\Tests\FakerTrait;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * Class MeEndpointTest.
 */
class MeEndpointTest extends TestCase
{
    use FakerTrait;

    /**
     * @var Client|MockObject
     */
    private $clientMock;

    /**
     * @var Serializer|MockObject
     */
    private $serializerMock;

    /**
     * @var Me|MockObject
     */
    private $meMock;

    public function testGet(): void
    {
        // Arrange
        $id = $this->getFaker()->uuid;
        $number = $this->getFaker()->randomNumber(2);
        $name = $this->getFaker()->company;
        $response = ['id' => $id, 'number' => $number, 'name' => $name];

        $this->clientMock
            ->method('request')
            ->with('/me', 'GET')
            ->willReturn($response);

        $this->serializerMock
            ->method('deserialize')
            ->with($response, Me::class)
            ->willReturn($this->meMock);

        // Act
        $endpoint = new MeEndpoint($this->clientMock, $this->serializerMock);
        $response = $endpoint->get();

        // Assert
        $this->assertSame($this->meMock, $response);
    }

    public function setUp(): void
    {
        $this->clientMock = $this->createMock(Client::class);
        $this->serializerMock = $this->createMock(Serializer::class);
        $this->meMock = $this->createMock(Me::class);
    }
}
