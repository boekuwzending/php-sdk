<?php

namespace Boekuwzending\Endpoints;

use Boekuwzending\Client;
use Boekuwzending\Exception\AuthorizationFailedException;
use Boekuwzending\Exception\RequestFailedException;
use Boekuwzending\Resource\TrackAndTrace;

/**
 * Class TrackAndTraceEndpoint
 */
class TrackAndTraceEndpoint extends AbstractEndpoint
{
    /**
     * @param string $id
     * @return mixed
     * @throws AuthorizationFailedException
     * @throws RequestFailedException
     */
    public function get(string $id)
    {
        $response = $this->client->request('/shipments/' . $id, Client::METHOD_GET);

        return $this->serializer->deserialize($response, TrackAndTrace::class);
    }
}