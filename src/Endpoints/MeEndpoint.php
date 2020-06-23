<?php

declare(strict_types=1);

namespace Boekuwzending\Endpoints;

use Boekuwzending\Client;
use Boekuwzending\Exception\AuthorizationFailedException;
use Boekuwzending\Exception\RequestFailedException;
use Boekuwzending\Resource\Me;

/**
 * Class ShipmentsEndpoint.
 */
class MeEndpoint extends AbstractEndpoint
{
    /**
     * @return Me
     * @throws AuthorizationFailedException
     * @throws RequestFailedException
     */
    public function get(): Me
    {
        $response = $this->client->request('/me', Client::METHOD_GET);

        return $this->serializer->deserialize($response, Me::class);
    }
}
