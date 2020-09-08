<?php

declare(strict_types=1);

namespace Boekuwzending\Endpoints;

use Boekuwzending\Client;
use Boekuwzending\Exception\AuthorizationFailedException;
use Boekuwzending\Exception\RequestFailedException;
use Boekuwzending\Resource\Label;

/**
 * Class LabelEndpoint.
 */
class LabelEndpoint extends AbstractEndpoint
{
    /**
     * @param string $id
     *
     * @return mixed
     * @throws AuthorizationFailedException
     * @throws RequestFailedException
     */
    public function get(string $id): Label
    {
        $response = $this->client->request('/labels/' . $id, Client::METHOD_GET);

        return $this->serializer->deserialize($response, Label::class);
    }

    /**
     * @param array $shipmentIds
     * @return array|string
     * @throws AuthorizationFailedException
     * @throws RequestFailedException
     */
    public function download(array $shipmentIds)
    {
        return $this->client->request('/labels/download-shipments', Client::METHOD_GET, [], [
            'shipments' => $shipmentIds
        ]);
    }
}
