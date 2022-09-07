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

    public function testGet(): void
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

    public function testCreate(): void
    {
        // Arrange
        $serializedShipment = [
            'sequence' => '12345',
            'service' => 'PostNL',
        ];

        $shipment = new Shipment();
        $shipment->setSequence($serializedShipment['sequence']);
        $shipment->setService($serializedShipment['service']);

        $this->serializerMock
            ->expects($this->once())
            ->method('serialize')
            ->with($shipment)
            ->willReturn($serializedShipment);

        $this->serializerMock
            ->expects($this->once())
            ->method('deserialize')
            ->with($serializedShipment)
            ->willReturn($shipment);

        $this->clientMock
            ->expects($this->once())
            ->method('request')
            ->with('/shipments', 'POST', $serializedShipment)
            ->willReturn($serializedShipment);

        // Act
        $endpoint = new ShipmentEndpoint($this->clientMock, $this->serializerMock);
        $endpoint->create($shipment);
    }

    public function setUp(): void
    {
        $this->clientMock = $this->createMock(Client::class);
        $this->serializerMock = $this->createMock(Serializer::class);
        $this->shipmentMock = $this->createMock(Shipment::class);
    }
}
