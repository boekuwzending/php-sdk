<?php

declare(strict_types=1);

namespace Boekuwzending\Tests\Endpoints;

use Boekuwzending\Client;
use Boekuwzending\Endpoints\LabelEndpoint;
use Boekuwzending\Resource\Label;
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

        // Act
        $endpoint = new LabelEndpoint($this->clientMock);
        $response = $endpoint->get($id);

        // Assert
        $this->assertInstanceOf(Label::class, $response);
        $this->assertSame($id, $response->getId());
        $this->assertSame($waybill, $response->getWaybill());
        $this->assertSame($reference, $response->getReference());
    }

    public function setUp()
    {
        $this->clientMock = $this->createMock(Client::class);
    }
}
