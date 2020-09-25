<?php

namespace Boekuwzending\Endpoints;

use Boekuwzending\Client;
use Boekuwzending\Exception\AuthorizationFailedException;
use Boekuwzending\Exception\RequestFailedException;
use Boekuwzending\Resource\Shipment;

/**
 * Class ServiceEndpoint
 */
class ServiceEndpoint extends AbstractEndpoint
{
    /**
     * @param Shipment $shipment
     *
     * @return Shipment
     * @throws AuthorizationFailedException
     * @throws RequestFailedException
     */
    public function create(Shipment $shipment): Shipment
    {
        $data = $this->client->request(
            '/services',
            Client::METHOD_POST,
            $this->serializer->serialize($shipment)
        );

        var_dump($data);
        exit;

        return $this->serializer->deserialize($data, Shipment::class);
    }
}