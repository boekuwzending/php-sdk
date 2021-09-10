<?php

declare(strict_types=1);

namespace Boekuwzending;

use Boekuwzending\Serializer\Serializer;
use Symfony\Component\HttpClient\HttpClient;

/**
 * Class BuzApiClientFactory.
 */
class ClientFactory
{
    /**
     * @param string $clientId
     * @param string $clientSecret
     * @param string $environment
     *
     * @return Client
     */
    public static function build(
        string $clientId,
        string $clientSecret,
        string $environment = Client::ENVIRONMENT_LIVE
    ): Client
    {
        $baseUriOverride = getenv('BUZ_API_URL');

        $httpClientOptions = array();

        if (false !== $baseUriOverride && '' !== $baseUriOverride) {
            $baseUri = $baseUriOverride;
            $httpClientOptions['verify_peer'] = false;
        } else {
            $baseUri = $environment === Client::ENVIRONMENT_STAGING ? Client::URL_STAGING : Client::URL_LIVE;
        }

        $serializer = new Serializer();
        $httpClient = HttpClient::createForBaseUri($baseUri, $httpClientOptions);

        $client = new Client($httpClient, $serializer);
        $client->setCredentials($clientId, $clientSecret);

        return $client;
    }
}
