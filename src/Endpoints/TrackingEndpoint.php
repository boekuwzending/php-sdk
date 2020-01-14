<?php

declare(strict_types=1);

namespace Boekuwzending\Endpoints;

use Boekuwzending\Client;
use Boekuwzending\Resource\Tracking;

/**
 * Class TrackingEndpoint.
 */
class TrackingEndpoint extends AbstractEndpoint
{
    public function get(string $id)
    {
        $response = $this->client->request('/trackings/' . $id, Client::METHOD_GET);

        return $this->serializer->deserialize($response, Tracking::class);
    }
}
