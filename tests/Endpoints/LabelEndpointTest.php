<?php

declare(strict_types=1);

namespace Boekuwzending\Tests\Endpoints;

use Boekuwzending\Client;
use Boekuwzending\Endpoints\LabelEndpoint;
use Boekuwzending\Resource\Label;
use Boekuwzending\Serializer\Serializer;
use Boekuwzending\Tests\FakerTrait;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * Class LabelEndpointTest.
 */
class LabelEndpointTest extends TestCase
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
     * @var Label|MockObject
     */
    private $labelMock;

    public function testGet(): void
    {
        // Arrange
        $id = $this->getFaker()->uuid;
        $waybill = $this->getFaker()->word;
        $reference = $this->getFaker()->text;
        $response = ['id' => $id, 'waybill' => $waybill, 'reference' => $reference];

        $this->clientMock
            ->method('request')
            ->with('/labels/' . $id, 'GET')
            ->willReturn($response);

        $this->serializerMock
            ->method('deserialize')
            ->with($response, Label::class)
            ->willReturn($this->labelMock);

        // Act
        $endpoint = new LabelEndpoint($this->clientMock, $this->serializerMock);
        $response = $endpoint->get($id);

        // Assert
        $this->assertSame($this->labelMock, $response);
    }

    public function setUp(): void
    {
        $this->clientMock = $this->createMock(Client::class);
        $this->serializerMock = $this->createMock(Serializer::class);
        $this->labelMock = $this->createMock(Label::class);
    }
}
