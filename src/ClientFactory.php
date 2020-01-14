<?php

declare(strict_types=1);

namespace Boekuwzending;

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
    ): Client {
        $baseUri = $environment === Client::ENVIRONMENT_STAGING ? Client::URL_STAGING : Client::URL_LIVE;

        $client = new Client(HttpClient::createForBaseUri($baseUri));
        $client->setCredentials($clientId, $clientSecret);

        return $client;
    }
}
