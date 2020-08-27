<?php

declare(strict_types=1);

namespace Boekuwzending;

use Boekuwzending\Endpoints\LabelEndpoint;
use Boekuwzending\Endpoints\MeEndpoint;
use Boekuwzending\Endpoints\ShipmentEndpoint;
use Boekuwzending\Endpoints\TrackAndTraceEndpoint;
use Boekuwzending\Exception\AuthorizationFailedException;
use Boekuwzending\Exception\NoCredentialsException;
use Boekuwzending\Exception\RequestFailedException;
use Boekuwzending\Serializer\Serializer;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * Class Client.
 */
class Client
{
    public const METHOD_GET = 'GET';
    public const METHOD_POST = 'POST';

    public const ENVIRONMENT_LIVE = 'live';
    public const ENVIRONMENT_STAGING = 'staging';

    public const URL_LIVE = 'https://api.boekuwzending.com';
    public const URL_STAGING = 'https://staging.api.boekuwzending.com';

    /**
     * @var HttpClientInterface
     */
    private $httpClient;

    /**
     * @var string
     */
    private $clientId;

    /**
     * @var string
     */
    private $clientSecret;

    /**
     * @var string
     */
    private $accessToken;

    /**
     * @var MeEndpoint
     */
    public $me;

    /**
     * @var ShipmentEndpoint
     */
    public $shipment;

    /**
     * @var LabelEndpoint
     */
    public $label;

    /**
     * @var TrackAndTraceEndpoint
     */
    public $trackAndTrace;

    /**
     * BuzApiClient constructor.
     *
     * @param HttpClientInterface $httpClient
     * @param Serializer          $serializer
     */
    public function __construct(HttpClientInterface $httpClient, Serializer $serializer)
    {
        $this->httpClient = $httpClient;

        $this->registerEndpoints($serializer);
    }

    /**
     * @param string $clientId
     * @param string $clientSecret
     */
    public function setCredentials(string $clientId, string $clientSecret): void
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
    }

    /**
     * @param string     $url
     * @param string     $method
     * @param array|null $body
     *
     * @return array|string
     * @throws AuthorizationFailedException
     * @throws RequestFailedException
     */
    public function request(string $url, string $method, array $body = null)
    {
        if (empty($this->accessToken)) {
            $this->authorize();
        }

        try {
            $response = $this->httpClient->request($method, $url, [
                'headers' => [
                    'Authorization' => sprintf('Bearer %s', $this->accessToken),
                ],
                'json' => $body ?? [],
            ]);

        } catch (TransportExceptionInterface $e) {
            throw new RequestFailedException($e->getMessage());
        }

        try {
            $json = json_decode($response->getContent(), true);

            if (!$json) {
                return $response->getContent();
            }

            return $json;
        } catch (ClientExceptionInterface | RedirectionExceptionInterface | ServerExceptionInterface | TransportExceptionInterface $e) {
            throw new RequestFailedException($e->getMessage());
        }
    }

    private function registerEndpoints(Serializer $serializer): void
    {
        $this->me = new MeEndpoint($this, $serializer);
        $this->shipment = new ShipmentEndpoint($this, $serializer);
        $this->trackAndTrace = new TrackAndTraceEndpoint($this, $serializer);
        $this->label = new LabelEndpoint($this, $serializer);
    }

    /**
     * @param array $scopes
     * @throws AuthorizationFailedException
     *
     * @return string
     */
    public function authorize(array $scopes = []): string
    {
        if (empty($this->clientId) || empty($this->clientSecret)) {
            throw new NoCredentialsException('API credentials not specified. Use Client::setCredentials');
        }

        $body = [
            'grant_type' => 'client_credentials',
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
        ];

        if(!empty($scopes)) {
            $body['scopes'] = implode(',', $scopes);
        }

        try {
            $response = $this->httpClient->request('POST', '/token', [
                'body' => $body,
            ]);
        } catch (TransportExceptionInterface $e) {
            throw new AuthorizationFailedException();
        }

        try {
            $response = json_decode($response->getContent(), true);
        } catch (ClientExceptionInterface | RedirectionExceptionInterface | ServerExceptionInterface | TransportExceptionInterface $e) {
            throw new AuthorizationFailedException();
        }

        $this->accessToken = $response['access_token'];

        return $this->accessToken;
    }
}
