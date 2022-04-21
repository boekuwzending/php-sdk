<?php

declare(strict_types=1);

namespace Boekuwzending\Tests\Endpoints;

use Boekuwzending\Client;
use Boekuwzending\Endpoints\ShipmentEndpoint;
use Boekuwzending\Endpoints\TrackAndTraceEndpoint;
use Boekuwzending\Resource\Shipment;
use Boekuwzending\Resource\TrackAndTrace;
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
     * @var TrackAndTrace|MockObject
     */
    private $trackingMock;

    public function testGet(): void
    {
        // Arrange
        $id = $this->getFaker()->uuid;
        $apiResponse = ['foo' => 'bar'];

        $this->clientMock
            ->method('request')
            ->with(sprintf('/track-and-trace/%s', $id), 'GET')
            ->willReturn($apiResponse);

        $this->serializerMock
            ->method('deserialize')
            ->with($apiResponse, TrackAndTrace::class)
            ->willReturn($this->trackingMock);

        // Act
        $endpoint = new TrackAndTraceEndpoint($this->clientMock, $this->serializerMock);
        $response = $endpoint->get($id);

        // Assert
        $this->assertSame($this->trackingMock, $response);
    }

    public function setUp(): void
    {
        $this->clientMock = $this->createMock(Client::class);
        $this->serializerMock = $this->createMock(Serializer::class);
        $this->trackingMock = $this->createMock(TrackAndTrace::class);
    }
}
