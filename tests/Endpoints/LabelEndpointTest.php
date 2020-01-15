<?php

declare(strict_types=1);

namespace Boekuwzending\Tests\Endpoints;

use Boekuwzending\Client;
use Boekuwzending\Endpoints\LabelEndpoint;
use Boekuwzending\Resource\Label;
use Boekuwzending\Serializer\Serializer;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * Class LabelEndpointTest.
 */
class LabelEndpointTest extends TestCase
{
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

    public function testGet()
    {
        // Arrange
        $id = '218c289a-1ff7-4f57-8217-b71a59fb5175';
        $waybill = 'test_waybill';
        $reference = 'test_reference';
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

    public function setUp()
    {
        $this->clientMock = $this->createMock(Client::class);
        $this->serializerMock = $this->createMock(Serializer::class);
        $this->labelMock = $this->createMock(Label::class);
    }
}
