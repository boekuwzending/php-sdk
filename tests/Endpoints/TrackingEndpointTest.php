<?php

declare(strict_types=1);

namespace Boekuwzending\Tests\Endpoints;

use Boekuwzending\Client;
use Boekuwzending\Endpoints\ShipmentEndpoint;
use Boekuwzending\Endpoints\TrackingEndpoint;
use Boekuwzending\Resource\Shipment;
use Boekuwzending\Resource\Tracking;
use Boekuwzending\Serializer\Serializer;
use Boekuwzending\Tests\FakerTrait;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * Class TrackingEndpointTest.
 */
class TrackingEndpointTest extends TestCase
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
     * @var Tracking|MockObject
     */
    private $trackingMock;

    public function testGet()
    {
        // Arrange
        $id = $this->getFaker()->uuid;
        $apiResponse = ['foo' => 'bar'];

        $this->clientMock
            ->method('request')
            ->with(sprintf('/trackings/%s', $id), 'GET')
            ->willReturn($apiResponse);

        $this->serializerMock
            ->method('deserialize')
            ->with($apiResponse, Tracking::class)
            ->willReturn($this->trackingMock);

        // Act
        $endpoint = new TrackingEndpoint($this->clientMock, $this->serializerMock);
        $response = $endpoint->get($id);

        // Assert
        $this->assertSame($this->trackingMock, $response);
    }

    public function setUp()
    {
        parent::setUp();

        $this->clientMock = $this->createMock(Client::class);
        $this->serializerMock = $this->createMock(Serializer::class);
        $this->trackingMock = $this->createMock(Tracking::class);
    }
}
