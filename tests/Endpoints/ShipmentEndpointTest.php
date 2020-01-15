<?php

declare(strict_types=1);

namespace Boekuwzending\Tests\Endpoints;

use Boekuwzending\Client;
use Boekuwzending\Endpoints\ShipmentEndpoint;
use Boekuwzending\Resource\Shipment;
use Boekuwzending\Serializer\Serializer;
use Boekuwzending\Tests\FakerTrait;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * Class ShipmentEndpointTest.
 */
class ShipmentEndpointTest extends TestCase
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
     * @var Shipment|MockObject
     */
    private $shipmentMock;

    public function testGet()
    {
        // Arrange
        $id = $this->getFaker()->uuid;
        $apiResponse = ['foo' => 'bar'];

        $this->clientMock
            ->method('request')
            ->with(sprintf('/shipments/%s', $id), 'GET')
            ->willReturn($apiResponse);

        $this->serializerMock
            ->method('deserialize')
            ->with($apiResponse, Shipment::class)
            ->willReturn($this->shipmentMock);

        // Act
        $endpoint = new ShipmentEndpoint($this->clientMock, $this->serializerMock);
        $response = $endpoint->get($id);

        // Assert
        $this->assertSame($this->shipmentMock, $response);
    }

    public function testCreate()
    {
        // Arrange
        $serializedShipment = ['foo' => 'bar'];

        $this->serializerMock
            ->expects($this->once())
            ->method('serialize')
            ->with($this->shipmentMock)
            ->willReturn($serializedShipment);

        $this->clientMock
            ->expects($this->once())
            ->method('request')
            ->with('/shipments', 'POST', $serializedShipment);

        // Act
        $endpoint = new ShipmentEndpoint($this->clientMock, $this->serializerMock);
        $endpoint->create($this->shipmentMock);
    }

    public function setUp()
    {
        parent::setUp();

        $this->clientMock = $this->createMock(Client::class);
        $this->serializerMock = $this->createMock(Serializer::class);
        $this->shipmentMock = $this->createMock(Shipment::class);
    }
}
