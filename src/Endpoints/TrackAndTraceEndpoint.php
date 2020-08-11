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
     * @return array
     * @throws AuthorizationFailedException
     * @throws RequestFailedException
     */
    public function get(string $id)
    {
        $response = $this->client->request(sprintf('/track-and-trace/%s', $id), Client::METHOD_GET);

        if (isset($response['error'])) {
            return $response;
        }

        return $this->serializer->deserialize($response, TrackAndTrace::class);
    }
}