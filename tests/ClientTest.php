<?php

declare(strict_types=1);

namespace Boekuwzending\Tests;

use Boekuwzending\Client;
use Boekuwzending\Exception\AuthorizationFailedException;
use Boekuwzending\Exception\NoCredentialsException;
use Boekuwzending\Serializer\Serializer;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\Exception\TransportException;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * Class ClientTest.
 */
class ClientTest extends TestCase
{
    /**
     * @var MockObject|HttpClientInterface
     */
    protected $httpClientMock;

    /**
     * @var MockObject|ResponseInterface
     */
    private $authorizationResponseMock;

    /**
     * @var MockObject|ResponseInterface
     */
    private $responseMock;

    /**
     * @var Serializer|MockObject
     */
    private $serializerMock;

    public function testAuthorization(): void
    {
        // Arrange
        $clientId = 'test_clientId';
        $clientSecret = 'test_clientSecret';
        $endpoint = '/foo/bar';
        $accessToken = 'test_accessToken';

        $this->httpClientMock
            ->expects($this->exactly(2))
            ->method('request')
            ->withConsecutive(
                [
                    'POST',
                    '/token',
                    [
                        'body' => [
                            'grant_type' => 'client_credentials',
                            'client_id' => $clientId,
                            'client_secret' => $clientSecret,
                        ],
                    ]
                ],
                [
                    'GET',
                    $endpoint,
                    [
                        'headers' => [
                            'Authorization' => sprintf('Bearer %s', $accessToken),
                            'User-Agent' => ''
                        ],
                        'json' => [],
                        'query' => [],
                    ]
                ]
            )
            ->willReturnOnConsecutiveCalls($this->authorizationResponseMock, $this->responseMock);

        $this->authorizationResponseMock
            ->method('getContent')
            ->willReturn(sprintf('{"access_token":"%s"}', $accessToken));

        $this->responseMock
            ->method('getContent')
            ->willReturn('{"foo":"bar"}');

        // Act
        $client = new Client($this->httpClientMock, $this->serializerMock);
        $client->setCredentials($clientId, $clientSecret);
        $response = $client->request($endpoint, 'GET');

        // Assert
        $this->assertSame(['foo' => 'bar'], $response);
    }

    public function testNoCredentials(): void
    {
        // Arrange
        $this->expectException(NoCredentialsException::class);
        $this->expectExceptionMessage('API credentials not specified. Use Client::setCredentials');

        // Act
        $client = new Client($this->httpClientMock, $this->serializerMock);
        $client->request('/foo/bar', 'GET');
    }

    public function testAuthorizationFails(): void
    {
        // Arrange
        $clientId = 'test_clientId';
        $clientSecret = 'test_clientSecret';

        $this->httpClientMock
            ->expects($this->once())
            ->method('request')
            ->with(
                'POST',
                '/token',
                [
                    'body' => [
                        'grant_type' => 'client_credentials',
                        'client_id' => $clientId,
                        'client_secret' => $clientSecret,
                    ],
                ]
            )
            ->willThrowException(new TransportException('Didn\'t go wel..'));

        $this->expectException(AuthorizationFailedException::class);

        // Act
        $client = new Client($this->httpClientMock, $this->serializerMock);
        $client->setCredentials($clientId, $clientSecret);
        $client->request('/foo/bar', 'GET');
    }

    public function setUp(): void
    {
        $this->httpClientMock = $this->createMock(HttpClientInterface::class);
        $this->authorizationResponseMock = $this->createMock(ResponseInterface::class);
        $this->responseMock = $this->createMock(ResponseInterface::class);
        $this->serializerMock = $this->createMock(Serializer::class);
    }
}
